module ApplicationHelper
  def title(text)
    content_for :title, text
  end

  def navbar_link(path, text)
    klass = 'nav-item align-self-center'
    klass << ' active' if request.path == path
    content_tag :li, class: klass do
      link_to text, path, class: 'nav-link'
    end
  end
end
