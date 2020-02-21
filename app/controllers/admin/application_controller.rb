# All Administrate controllers inherit from this `Admin::ApplicationController`,
# making it the ideal place to put authentication logic or other
# before_actions.
#
# If you want to add pagination or other controller-level concerns,
# you're free to overwrite the RESTful controller actions.
module Admin
  class ApplicationController < Administrate::ApplicationController
    before_action :authenticate_user!
    before_action :authenticate_admin

    def order
      @order ||= Administrate::Order.new(
        params.fetch(resource_name, {}).fetch(:order, 'created_at'),
        params.fetch(resource_name, {}).fetch(:direction, 'desc'),
      )
    end

    def authenticate_admin
      # TODO Add authentication logic here.
      unless current_user.admin
        redirect_to root_path
      end
    end

    # Override this value to specify the number of elements to display at a time
    # on index pages. Defaults to 20.
    # def records_per_page
    #   params[:per_page] || 20
    # end
  end
end
