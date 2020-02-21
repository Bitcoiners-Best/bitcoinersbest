class ApplicationController < ActionController::Base
  before_action :set_meta_tags

  def set_meta_tags
    @page_description = "Bitcoiners Best is the best bitcoin content curated by bitcoiners."
  end

  def back_link_available?
    !request.referrer.blank? &&
    request.referrer.include?(request.base_url)
  end
end
