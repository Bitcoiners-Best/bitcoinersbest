class VotesController < ApplicationController
  before_action :find_resource

  def new
    vote_service = VoteService.new(current_user, @resource)

    if vote_service.has_already_voted?
      @vote = vote_service.get_voting_invoice(amount: 100, vote_count: 10)
    else
      @vote = vote_service.create_free_vote(vote_count: 1)
    end

    @vote.save!

    render json: @vote
  end

  private

  def find_resource
    @resource = Resource.find(params[:resource_id]) if params[:resource_id]
  end
end
