class ResourcePendingClassificationNotifierJob < ApplicationJob
  queue_as :default

  def perform(resource_id, url, title, author)
    resource = Resource.find(resource_id)

    webhook_url = Rails.application.credentials.dig(:webhooks, :keybase, :new_resource)

    if webhook_url
      RestClient.get(webhook_url, params: {
        msg: "#{url} submitted by #{resource.created_by.decorate.name} pending classification: #{Rails.application.routes.url_helpers.classify_resource_url(resource.id, url: url, title: title, author: author)}"
      })
    end
  end
end
