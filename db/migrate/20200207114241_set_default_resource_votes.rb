class SetDefaultResourceVotes < ActiveRecord::Migration[6.0]
  def change
    change_column :resources, :votes, :integer, default: 0
  end
end
