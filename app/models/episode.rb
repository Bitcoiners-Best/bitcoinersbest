class Episode < ApplicationRecord
  include RemoteImageable
  include Imageable

  has_one :resource, as: :resourceable, dependent: :destroy

  validates :title, presence: true
  validates :url, url: { allow_blank: true }
end
