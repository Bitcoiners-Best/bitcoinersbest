require 'active_support/concern'

module Imageable
  extend ActiveSupport::Concern

  included do
    has_one_attached :image

    validate :image_format, if: -> { image.attached? }

    private

    def image_format
      if image.blob.byte_size > 5_000_000
        # image.purge
        errors.add(:image, 'is too big')
      elsif !image.blob.content_type.starts_with?('image/')
        # image.purge
        errors.add(:image, 'is not a valid image')
      end
    end
  end
end
