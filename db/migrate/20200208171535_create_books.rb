class CreateBooks < ActiveRecord::Migration[6.0]
  def change
    create_table :books do |t|
      t.string :title
      t.string :created_by
      t.string :url

      t.timestamps
    end
  end
end
