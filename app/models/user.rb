 class User < ApplicationRecord
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable, :trackable and :omniauthable
  devise :database_authenticatable, :registerable,
         :rememberable, :validatable,
         :omniauthable, omniauth_providers: %i[twitter lightning]

  has_many :votes, dependent: :destroy
  has_many :resources, foreign_key: :created_by_id, dependent: :destroy

  extend FriendlyId
  friendly_id :username, use: :slugged

  def email_required?
    provider == nil
  end

  def password_required?
    provider == nil
  end

  def self.from_omniauth(auth)
    where(provider: auth.provider, uid: auth.uid).first_or_create! do |user|
      user.email = auth.info.email
      user.password = Devise.friendly_token[0, 20]
      user.name = auth.info.name # assuming the user model has a name
      user.username = auth.info.nickname # assuming the user model has a username
      user.image = auth.info.image
      user.description = auth.info.description
      # If you are using confirmable and the provider(s) you use validate emails,
      # uncomment the line below to skip the confirmation emails.
      # user.skip_confirmation!
    end
  end

  def settled_votes_for(resource)
    votes.settled.select{|vote| vote.resource_id == resource.id}.count
  end

  def image
    super || 'https://avatars.io/twitter//small'
  end

  def twitter_url
    if provider == 'twitter'
      "https://twitter.com/#{username}"
    end
  end
end
