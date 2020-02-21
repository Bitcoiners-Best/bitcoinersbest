class Article < ApplicationRecord
  include RemoteImageable
  include Imageable

  has_one :resource, as: :resourceable, dependent: :destroy

  validates :title, presence: true
  validates :url, presence: true, url: { allow_blank: true}

  def item_path
    Rails.application.routes.url_helpers.article_path(self.resource.slug)
  end
end
