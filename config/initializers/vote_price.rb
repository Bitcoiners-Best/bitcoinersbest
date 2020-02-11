VOTE_10X_PRICE = case Rails.env
when 'development', 'test' then 10
when 'production' then 10000
end
