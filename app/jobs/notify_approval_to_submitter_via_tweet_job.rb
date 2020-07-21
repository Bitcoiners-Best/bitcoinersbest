class NotifyApprovalToSubmitterViaTweetJob < ApplicationJob
  queue_as :default

  def perform(resource_id)
    resource = Resource.find(resource_id)
    TwitterService.notify_approval_to_submitter_via_tweet(resource)
  end
end
