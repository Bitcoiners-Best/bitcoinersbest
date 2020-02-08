class TwitterThreadsController < ApplicationController
  before_action :find_resource

  def show
  end

  private

  def find_resource
    @resource = Resource.friendly.find(params[:id])
  end
end
