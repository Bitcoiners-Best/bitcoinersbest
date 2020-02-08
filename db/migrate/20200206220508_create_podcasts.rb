class CreatePodcasts < ActiveRecord::Migration[6.0]
  def change
    create_table :podcasts do |t|
      t.string :url
      t.string :title
      t.text :description
      t.string :created_by
      t.string :rss

      t.timestamps
    end
  end
end
