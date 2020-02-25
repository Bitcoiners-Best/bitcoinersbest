class ResourceQuery
  def self.query(type:, time_scope:, visible_only: true)
    r = Resource
    if type
      r = r.where(resourceable_type: type.to_s.classify)
    else
      r = r.where('resourceable_type != ?', 'Project')
    end

    r = case time_scope
    when 'week' then r.where('created_at > ?', 1.week.ago)
    when 'all' then r
    end

    r=
    r = r.visible if visible_only
    r
  end
end
