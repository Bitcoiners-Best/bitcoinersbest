rest_client = Twitter::REST::Client.new do |config|
  config.consumer_key        = Rails.application.credentials.twitter[:key]
  config.consumer_secret     = Rails.application.credentials.twitter[:secret]
  config.access_token        = Rails.application.credentials.twitter[:access_token]
  config.access_token_secret = Rails.application.credentials.twitter[:access_token_secret]
end

client = Twitter::Streaming::Client.new do |config|
  config.consumer_key        = Rails.application.credentials.twitter[:key]
  config.consumer_secret     = Rails.application.credentials.twitter[:secret]
  config.access_token        = Rails.application.credentials.twitter[:access_token]
  config.access_token_secret = Rails.application.credentials.twitter[:access_token_secret]
end

topics = ["@bitcoinersbest"]

def process_tweet(tweet)
  puts "Processing tweet: #{tweet.full_text}"

  t2r = TweetToResourceService.new(tweet)
  resource = t2r.save

  puts "Created resource #{resource.id}"
end

client.filter(track: topics.join(",")) do |object|
  process_tweet(object) if object.is_a?(Twitter::Tweet)
end
