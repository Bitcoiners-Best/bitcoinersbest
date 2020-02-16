class UserFakerService
  def initialize(user)
    @user = user
  end

  def fake
    movie_source = [
      Faker::Movies::BackToTheFuture,
      Faker::Movies::Ghostbusters,
      Faker::Movies::HarryPotter,
      Faker::Movies::HitchhikersGuideToTheGalaxy,
      Faker::Movies::Hobbit,
      Faker::Movies::Lebowski,
      Faker::Movies::LordOfTheRings,
      Faker::Movies::PrincessBride,
      Faker::Movies::StarWars,
      Faker::Movies::VForVendetta,
    ].sample

    @user.name = movie_source.character
    @user.description = movie_source.quote
  end
end
