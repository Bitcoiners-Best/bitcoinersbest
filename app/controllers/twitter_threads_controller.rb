class TwitterThreadsController < ApplicationController
  include Metataggable
  prepend_before_action :find_resource

  def show
    @display_back_button = true
  end

  private

  def find_resource
    @resource = Resource.friendly.find(params[:id])
  end
end
