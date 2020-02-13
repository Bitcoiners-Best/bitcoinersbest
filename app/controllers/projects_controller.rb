class ProjectsController < ApplicationController
  before_action :find_project, except: [ :index ]

  def index
    @last_donation_time = Donation.first.try(:created_at)
    @projects = Resource.where(resourceable_type: 'Project')
    @projects = @projects.where('created_at > ?', @last_donation_time) if @last_donation_time
    @projects = @projects.visible
    @projects = @projects.paginate(page: params[:page], per_page: 15)

    @donation_amount = Vote.settled
    @donation_amount = @donation_amount.where('created_at > ?', @last_donation_time)
    @donation_amount = @donation_amount.sum(:payment_amount)
  end

  def show
  end

  private

  def find_project
    @resource = Resource.friendly.find(params[:id])
  end
end
