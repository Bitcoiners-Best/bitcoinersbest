class ResourceQuery
  def self.query(type:, time_scope:, visible_only: true)
    r = Resource
    r = r.where(resourceable_type: type.to_s.classify) if type
    r = case time_scope
    when 'week' then r.where('created_at > ?', 1.week.ago)
    when 'all' then r
    end

    r = r.visible if visible_only
    r
  end
end
