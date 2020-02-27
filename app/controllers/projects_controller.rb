class ProjectsController < ApplicationController
  before_action :find_project, except: [ :index ]

  def index
    @projects = Resource.where(resourceable_type: 'Project')
                        .visible
                        .paginate(page: params[:page], per_page: 15)

    @page_title = "Vote for this month's open-source donation"
    @page_description = "Every month we donate all proceeds from 10x votes to the bitcoin open-source project at the top of this list."
  end

  def show
  end

  private

  def find_project
    @resource = Resource.friendly.find(params[:id])
  end
end
