class RenameResourceVote < ActiveRecord::Migration[6.0]
  def change
    rename_column :resources, :votes, :vote_count
  end
end
