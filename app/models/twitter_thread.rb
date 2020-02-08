class TwitterThread < ApplicationRecord
  has_one :resource, as: :resourceable, dependent: :destroy
s
  validates :title, presence: true
end
