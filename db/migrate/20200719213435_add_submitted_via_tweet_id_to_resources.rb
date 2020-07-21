class AddSubmittedViaTweetIdToResources < ActiveRecord::Migration[6.0]
  def change
    add_column :resources, :submitted_via_tweet_id, :string
  end
end
