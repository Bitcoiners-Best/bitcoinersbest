class ApplicationController < ActionController::Base
  before_action :set_meta_tags
  before_action :load_resources_pending_approval, if: -> { current_user.try(:admin?) }
  before_action :load_donations

  def set_meta_tags
    @page_description = "Bitcoiners Best is the best bitcoin content curated by bitcoiners."
  end

  def back_link_available?
    !request.referrer.blank? &&
    request.referrer.include?(request.base_url) &&
    request.referrer != "#{request.base_url}#{request.original_fullpath}"
  end

  def load_resources_pending_approval
    @resources_pending_approval = Resource.pending_approval.count
  end

  def load_donations
    @donations = Donation.all
    @donation_amount = Vote.settled
    @donation_amount = @donation_amount.where('created_at > ?', @last_donation_time) if @last_donation_time
    @donation_amount = @donation_amount.sum(:payment_amount)
  end

  def require_admin
    redirect_to root_path unless current_user.try(:admin?)
  end
end
