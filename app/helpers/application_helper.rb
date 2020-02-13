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
