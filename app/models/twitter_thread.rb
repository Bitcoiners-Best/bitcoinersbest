class TwitterThread < ApplicationRecord
  include Imageable

  has_one :resource, as: :resourceable, dependent: :destroy
  after_initialize :pull_tweet_data
  before_validation :validate_tweet_url

  validates :title, presence: true

  def item_path
    Rails.application.routes.url_helpers.twitter_thread_path(self.resource.slug)
  end

  def pull_tweet_data
    if ! self.title || ! self.image.attached?
      @tweet_service = TweetService.new(url) rescue nil

      if @tweet_service
        self.title ||= @tweet_service.text
        self.created_by ||= "@#{@tweet_service.author}"

        uri = URI.parse(@tweet_service.image)
        remote_file = Net::HTTP.get_response(uri)
        file = StringIO.new(remote_file.body)
        self.image.attach(io: file, filename: File.basename(uri.path))

        self.image_is_profile = @tweet_service.image_is_profile
      end
    end
  end

  def validate_tweet_url
    begin
      @tweet_service = TweetService.new(url)
    rescue => e
      errors.add(:url, e.message)
      return
    end
  end
end
