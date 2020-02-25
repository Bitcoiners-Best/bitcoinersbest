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
end
