class Podcast < ApplicationRecord
  include RemoteImageable
  include Imageable

  has_one :resource, as: :resourceable, dependent: :destroy

  validates :title, presence: true
  validates :url, url: { allow_blank: true }

  def item_path
    Rails.application.routes.url_helpers.podcast_path(self.resource.slug)
  end
end
