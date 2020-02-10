class AddApprovedToResource < ActiveRecord::Migration[6.0]
  def change
    add_column :resources, :approved, :boolean, default: false
    add_column :resources, :archived, :boolean, default: false
  end
end
