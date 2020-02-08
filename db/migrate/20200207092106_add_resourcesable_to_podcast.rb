class AddResourcesableToPodcast < ActiveRecord::Migration[6.0]
  def change
    add_reference :podcasts, :resourceable, polymorphic: true
  end
end
