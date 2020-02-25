class DonationsController < ApplicationController
  before_action :find_donations, except: [:index]

  def index
    @donations = Donation.all
  end



  private
  def find_donations
    @donations = Donations.find(params[:id]) if params[:id]
  end
end
