class VoteService
  attr_reader :user, :resource

  def initialize(user, resource)
    @user = user
    @resource = resource
  end

  def settled_votes
    @user.votes
      .where(resource: @resource)
      .where(settled: true)
      .count
  end

  def get_voting_invoice(amount:, vote_count:)
    vote = fetch_unexpired_unsettled_vote(amount: amount, vote_count: vote_count)
    vote ||= create_vote_with_invoice(amount: amount, vote_count: vote_count)
  end

  def create_free_vote(vote_count:)
    @user.votes.build(
      resource: @resource,
      settled: true,
      count: vote_count,
    )
  end

  private

  def create_vote_with_invoice(amount:, vote_count:)
    data = LnpayService.create_invoice(amount, "Vote for '#{@resource.slug}' on bitcoiners.best")

    @user.votes.build(
      resource: @resource,
      payment_id: data['id'],
      payment_amount: data['num_satoshis'],
      payment_request: data['payment_request'],
      expires_at: Time.at(data['expires_at']),
      settled: false,
      count: vote_count,
    )
  end

  def fetch_unexpired_unsettled_vote(amount:, vote_count:)
    @user.votes
      .where(resource: @resource)
      .where(settled: false)
      .where(payment_amount: amount)
      .where(count: vote_count)
      .where('expires_at > ?', Time.now())
      .first
  end
end
