class ResourceDecorator < Draper::Decorator
  decorates_association :created_by
  delegate_all
end
