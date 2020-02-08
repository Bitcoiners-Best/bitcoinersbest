class CreateArticles < ActiveRecord::Migration[6.0]
  def change
    create_table :articles do |t|
      t.string :url
      t.string :title
      t.string :created_by
      t.text :description

      t.timestamps
    end
  end
end
