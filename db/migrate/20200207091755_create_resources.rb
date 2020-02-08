class CreateResources < ActiveRecord::Migration[6.0]
  def change
    create_table :resources do |t|
      t.integer :votes
      t.references :created_by
      t.bigint :resourceable_id
      t.string :resourceable_type

      t.timestamps
    end

    add_index :resources, [:resourceable_id, :resourceable_type]
  end
end
