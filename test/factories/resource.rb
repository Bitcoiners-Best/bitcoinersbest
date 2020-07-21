FactoryBot.define do
  factory :user do
    provider { 'twitter' }
    email { Faker::Internet.email }
    username { 'pablof7z' }
  end
end

FactoryBot.define do
  factory :book do
    title { Faker::Book.name }
  end
end

FactoryBot.define do
  factory :resource do
    resourceable factory: :book

    created_by factory: :user

    factory :resource_from_tweet do
      submitted_via_tweet_id { 12345 }

      factory :unapproved_resource_from_tweet do
        approved { false }
      end
    end
  end
end

