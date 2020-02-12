class TweetService
  class InvalidResource < StandardError; end

  def initialize(tweet_url)
    @url = TweetUrl.parse(tweet_url)

    if @url.username.blank? || @url.status_id.blank?
      raise InvalidResource.new("doesn't point to a valid tweet")
    end

    client = Twitter::REST::Client.new do |config|
      config.consumer_key    = Rails.application.credentials.twitter[:key]
      config.consumer_secret = Rails.application.credentials.twitter[:secret]
    end

    @tweet = client.status(@url.status_id, tweet_mode: 'extended')
  end

  def text
    @tweet.full_text
  end

  def author
    @url.username
  end

  def image
    if @tweet.media?
      @tweet.media[0].media_uri.to_s
    else
      profile_image
    end
  end

  def profile_image
    @tweet.user.profile_image_url_https.to_s
  end
end
