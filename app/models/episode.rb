class Episode < ApplicationRecord
  has_one :resource, as: :resourceable, dependent: :destroy
  has_one_attached :image

  validates :title, presence: true
end
