# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)

print "creating users"
users = 50.times.map do
  u = User.new(
    name: Faker::Name.name,
    email: Faker::Internet.email,
    password: 'aaaaaaaaa',
    admin: false
  )
  u.save!
  u
end
puts

creation_times = (1.month.ago.to_i..Time.now.to_i).to_a

print "creating resources"
resources = 5000.times.map do |i|
  print " #{i}" if i % 1000 == 0
  r = Resource.new(
    created_by: users.sample,
    resourceable_type: %w(Book Podcast Episode).sample,
    resourceable_attributes: {
      title: Faker::Book.title,
    },
    created_at: Time.at(creation_times.sample),
    approved: true
  )
  r.save!
  r
end
puts

print "creating votes"
100000.times do |i|
  print " #{i}" if i % 1000 == 0
  Vote.create!(
    user: users.sample,
    resource: resources.sample,
    count: %w(1 10).sample.to_i,
    settled: true
  )
end
puts
