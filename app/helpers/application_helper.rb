module ApplicationHelper
  def resource_navbar_link(text, category:, time_scope:)
    path = ""
    path << "/#{category.to_s.pluralize}" if category
    path << "/#{time_scope}" if time_scope
    path = "/" if path.blank?

    klass = "module-navigation-element"
    klass << " active" if request.path == path

    link_to text, path, class: klass
  end

  def navbar_link(path, text)
    klass = 'nav-item align-self-center'
    klass << ' active' if request.path == path
    content_tag :li, class: klass do
      link_to text, path, class: 'nav-link'
    end
  end

  def resource_category_name(name)
    case name
    when :twitter_thread then 'Threads'
    else
      Resource::CATEGORIES[name].pluralize
    end
  end

  def resource_list_image_class(resource)
    klass = 'ew-100 card-img'

    if resource.resourceable.try(:image_is_profile)
      klass << ' br-circle'
    end

    klass
  end

  def nice_sats_number(number)
    case number
    when 0..999 then "#{number.to_i} sats"
    when 1_000..999_999 then "#{number_to_human((number/1_000).to_i)}k sats"
    when 1_000_000..99_999_999 then "#{number_to_human((number/1_000_000).round(3))} million sats"
    else
      "#{number_to_human((number/100_000_000).round(5))} btc"
    end
  end
end
