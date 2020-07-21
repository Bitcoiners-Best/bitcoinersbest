class Podcast < ApplicationRecord
  include RemoteImageable
  include Imageable
  acts_as_taggable_on :authors

  has_one :resource, as: :resourceable, dependent: :destroy

  around_save :update_resource_slug, if: -> { resource && changed_attribute_names_to_save.include?('title') }

  validates :title, presence: true
  validates :url, url: { allow_blank: true }

  def update_resource_slug
    yield
    resource.slug = nil
    resource.save
  end

  def item_path
    Rails.application.routes.url_helpers.podcast_path(self.resource.slug)
  end
end
