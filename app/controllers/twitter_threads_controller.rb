class TwitterThreadsController < ApplicationController
  include Metataggable
  prepend_before_action :find_resource

  def show
    @display_back_button = back_link_available?
    @resource = @resource.decorate
  end

  private

  def find_resource
    @resource = Resource.friendly.find(params[:id])
  end
end
