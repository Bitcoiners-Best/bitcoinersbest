class Project < ApplicationRecord
  include RemoteImageable
  include Imageable

  acts_as_taggable_on :authors

  has_one :resource, as: :resourceable, dependent: :destroy
  has_one_attached :image

  validates :title, presence: true
  validates :url, url: true

  def item_path
    Rails.application.routes.url_helpers.project_path(self.resource.slug)
  end
end
