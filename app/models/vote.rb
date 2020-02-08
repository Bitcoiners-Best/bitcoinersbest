class Vote < ApplicationRecord
  belongs_to :user
  belongs_to :resource

  after_save :reload_resource_vote_count
  after_destroy :reload_resource_vote_count

  scope :settled, -> { where(settled: true) }

  def reload_resource_vote_count
    resource.update_vote_count
  end
end
