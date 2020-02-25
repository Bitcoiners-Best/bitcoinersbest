class VotesController < ApplicationController
  before_action :find_resource

  def new
    vote_service = VoteService.new(current_user, @resource)

    case vote_service.settled_votes
    when 0
      @vote = vote_service.create_free_vote(vote_count: 1)
      @vote.save!
    when 1
      if @resource.resourceable_type == 'Project'
        @vote = { error: 'already-voted' }
      else
        @vote = vote_service.get_voting_invoice(amount: VOTE_10X_PRICE, vote_count: 10)
        @vote.save!
      end
    else
      @vote = { error: 'already-voted' }
    end

    render json: @vote
  end

  private

  def find_resource
    @resource = Resource.find(params[:resource_id]) if params[:resource_id]
  end
end
