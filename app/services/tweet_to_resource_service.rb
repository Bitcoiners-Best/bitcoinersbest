class TweetToResourceService
  AUTHOR_REGEXP = /by ([@]*\w+)/i
  TYPE_REGEXPS = Resource::CATEGORIES.map do |key, category_name|
    [ key, /add(.)*(#{category_name})/i ]
  end.to_h
  TITLE_REGEXP = /add (.*) (#{Resource::CATEGORIES.values.join('|')})/i

  attr_reader :tweet

  def initialize(tweet)
    @tweet = tweet
  end

  def type
    type = TYPE_REGEXPS.detect {|key, regexp| tweet.full_text.match regexp}

    begin
      type[0].to_s.classify.constantize if type
    rescue NameError
      nil
    end
  end

  def author
    match = tweet.full_text.match AUTHOR_REGEXP

    match[1] if match
  end

  def title
    match = tweet.full_text.match TITLE_REGEXP

    match[1] if match
  end

  def url
    if tweet.urls?
      tweet.urls[0].expanded_url
    end
  end

  def submitter
    tweet.user.screen_name if tweet
  end

  def submitter_user
    user = User.where(provider: 'twitter', username: submitter).first_or_initialize

    if user.new_record?
      user.email = "#{Time.now.to_i}@randomly-generated.email"
      user.save
    end

    user
  end

  def save
    resource = Resource.new
    resource.created_by = submitter_user
    resource.submitted_via_tweet_id = tweet.id

    if type
      resource.resourceable = type.new(
        title: title || url,
        url: url,
        author_list: author
      )

      resource.save!
    else
      resource.save!(validate: false)

      ResourcePendingClassificationNotifierJob.perform_later(resource.id, url.to_s, title, author)
    end

    resource
  end
end
