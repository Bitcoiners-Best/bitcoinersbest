class TwitterService
  class << self
    def notify_approval_to_submitter_via_tweet(resource)
      rest_client = Twitter::REST::Client.new do |config|
        config.consumer_key        = Rails.application.credentials.twitter[:key]
        config.consumer_secret     = Rails.application.credentials.twitter[:secret]
        config.access_token        = Rails.application.credentials.twitter[:access_token]
        config.access_token_secret = Rails.application.credentials.twitter[:access_token_secret]
      end

      screen_name = resource.created_by.username

      msg = "@#{screen_name} thanks for your submission!\n\n" \
            "We've reviewed it and it's now live on " \
            "#{resource.url}!\n" \
            "Don't forget to upvote it!"

      rest_client.update(msg, {
        in_reply_to_status_id: resource.submitted_via_tweet_id
      })
    end
  end
end
