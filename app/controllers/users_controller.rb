class UsersController < ApplicationController
  before_action :find_user

  def show
    @user = @user.decorate
    @resources = @user.resources
                   .visible
                   .paginate(page: params[:page], per_page: 5)
  end

  private

  def find_user
    if params[:id]
      @user = User.friendly.find(params[:id])
    else
      @user ||= current_user
    end
  end
end
