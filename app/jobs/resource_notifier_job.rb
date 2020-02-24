class ResourceNotifierJob < ApplicationJob
  queue_as :default

  def perform(resource)
    url = Rails.application.credentials.dig(:webhooks, :keybase, :new_resource)

    if url
      resource_url = Rails.application.routes.url_helpers.edit_admin_resource_url(resource.id)

      RestClient.get(url, params: {
        msg: "'#{resource.title}' submitted by #{resource.created_by.decorate.name} pending approval: #{resource_url}"
      })
    end
  end
end
