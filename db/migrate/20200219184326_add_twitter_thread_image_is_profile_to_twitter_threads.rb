class AddTwitterThreadImageIsProfileToTwitterThreads < ActiveRecord::Migration[6.0]
  def change
    add_column :twitter_threads, :image_is_profile, :boolean, default: true
  end
end
