module ApplicationHelper
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

  def back_or_default(default = root_path)
    if request.env["HTTP_REFERER"].present? && request.env["HTTP_REFERER"] != request.env["REQUEST_URI"]
      :back
    else
      default
    end
  end
end
