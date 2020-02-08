class CreateEpisodes < ActiveRecord::Migration[6.0]
  def change
    create_table :episodes do |t|
      t.string :title
      t.string :created_by
      t.string :podcast
      t.string :url

      t.timestamps
    end
  end
end
