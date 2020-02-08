class AddSlugToResources < ActiveRecord::Migration[6.0]
  def change
    add_column :resources, :slug, :string
    add_index :resources, :slug, unique: true
  end
end
