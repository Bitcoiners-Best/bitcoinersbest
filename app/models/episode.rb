class Episode < ApplicationRecord
  has_one :resource, as: :resourceable, dependent: :destroy

  validates :title, presence: true
end
