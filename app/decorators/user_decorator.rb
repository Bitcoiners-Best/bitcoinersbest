class UserDecorator < ApplicationDecorator
  delegate_all

  def name
    name = object.name
    name = object.username if name.blank?
    name = object.email if name.blank?
    name = "a #{object.provider} user" if name.blank? && object.provider
    name = "an anonymous user" if name.blank?
    name
  end
end
