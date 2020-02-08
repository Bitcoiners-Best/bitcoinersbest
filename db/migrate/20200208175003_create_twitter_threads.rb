class CreateTwitterThreads < ActiveRecord::Migration[6.0]
  def change
    create_table :twitter_threads do |t|
      t.string :title
      t.string :url
      t.string :created_by

      t.timestamps
    end
  end
end
