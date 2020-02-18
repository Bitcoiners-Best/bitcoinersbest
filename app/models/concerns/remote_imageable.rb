require 'active_support/concern'

module RemoteImageable
  extend ActiveSupport::Concern

  included do
    attr_accessor :image_url

    before_validation :attach_image_from_url, unless: -> { image_url.blank? }
    validates :image_url, url: { allow_blank: true }

    def attach_image_from_url
      begin
        uri = URI.parse(image_url)
        remote_file = Net::HTTP.get_response(uri)
        file = StringIO.new(remote_file.body)
        self.image.attach(io: file, filename: File.basename(uri.path))
      rescue => e
        errors.add(:image_url, e.message)
      end
    end
  end
end
