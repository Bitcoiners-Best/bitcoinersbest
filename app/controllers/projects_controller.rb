class ProjectsController < ApplicationController
  before_action :find_project, except: [ :index ]

  def index
    @projects = Resource.where(resourceable_type: 'Project')
                        .visible
                        .paginate(page: params[:page], per_page: 15)
  end

  def show
  end

  private

  def find_project
    @resource = Resource.friendly.find(params[:id])
  end
end
