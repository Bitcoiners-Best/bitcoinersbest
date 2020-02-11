class UserDecorator < ApplicationDecorator
  delegate_all

  def name
    name = object.name unless object.name.blank?
    name ||= object.username unless object.username.blank?
    name ||= 'anonymous user'
    name
  end
end
