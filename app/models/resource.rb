class Resource < ApplicationRecord
  CATEGORIES = {
    podcast: 'Podcast'.freeze,
    episode: 'Episode'.freeze,
    article: 'Article'.freeze,
    book: 'Book'.freeze,
    twitter_thread: 'Twitter Thread'.freeze,
    project: 'Project'.freeze,
  }.freeze

  extend FriendlyId
  friendly_id :title, use: :slugged

  belongs_to :created_by, class_name: 'User'
  belongs_to :resourceable, polymorphic: true, dependent: :destroy
  has_many :votes, dependent: :destroy

  validates :slug, presence: true

  delegate :title,
           :description,
           :url,
           :rss,
           :image,
           :item_path,
           :authors,
           to: :resourceable, prefix: false, allow_nil: true

  accepts_nested_attributes_for :resourceable

  scope :visible, -> { where(approved: true, archived: false) }
  scope :pending_approval, -> { where.not(approved: true).where(archived: false) }

  default_scope { order(vote_count: :desc) }

  after_create :notify_new_resource, if: -> { !approved? && resourceable }
  before_update :notify_approval_to_submitter_via_tweet, if: -> { submitted_via_tweet_id && approved? && changed_attribute_names_to_save.include?('approved') }

  def should_generate_new_friendly_id?
    slug.nil?
  end

  def self.human_attribute_name(attr, options={})
    super(attr, options)
      .gsub(/resourceable /i, '')
      .capitalize
  end

  def should_generate_new_friendly_id?
    resourceable.try(:title_changed?) || slug == nil
  end

  def build_resourceable(params)
    self.resourceable = resourceable_type.constantize.new(params)
  end

  def vote_counted?
    true
  end

  def update_vote_count
    update(vote_count: votes.settled.sum('count'))
    ActionCable.server.broadcast('votes_channel', {resource_id: id, votes: vote_count})
  end

  def notify_approval_to_submitter_via_tweet
    NotifyApprovalToSubmitterViaTweetJob.perform_now(self.id)
  end

  def notify_new_resource
    ResourceNotifierJob.perform_later(self)
  end

  def url
    Rails.application.routes.url_helpers.send("#{resourceable_type.underscore}_url", slug)
  end
end
