class SetDefaultResourceVotes < ActiveRecord::Migration[6.0]
  def change
    set_default :resources, :votes, 0
  end
end
