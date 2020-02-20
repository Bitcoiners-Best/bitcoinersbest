require 'active_support/concern'

module Metataggable
  extend ActiveSupport::Concern

  included do
    before_action :add_collection_meta_tags, only: [:index]
    before_action :add_resource_meta_tags, only: [:show]

    def add_collection_meta_tags
      if params[:type]
        @page_title = Resource::CATEGORIES[params[:type].to_sym].pluralize
      end
    end

    def add_resource_meta_tags
      puts "runnning add_meta_tags"
      @page_title = @resource.title

      description = @resource.description rescue nil
      @page_description = description if description

      if @resource.image && @resource.image.attached?
        image = rails_representation_url(@resource.image.variant(resize_and_pad: [300, 157]).processed, disposition: "inline")
        @page_image = image if image
      end
    end
  end
end
