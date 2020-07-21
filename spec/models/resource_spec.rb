require 'rails_helper'

RSpec.describe 'Resource' do
  context 'resource created via a tweet' do
    let (:resource) { create(:unapproved_resource_from_tweet) }

    it 'does not tweet when the resource has already been approved and a change happens' do
      expect(TwitterService).to receive(:notify_approval_to_submitter_via_tweet).once
      resource.update(approved: true)
      resource.update(vote_count: 1000)
    end

    it 'original tweet is replied to when the resource is approved' do
      expect(TwitterService).to receive(:notify_approval_to_submitter_via_tweet)
      resource.update(approved: true)
    end
  end
end
