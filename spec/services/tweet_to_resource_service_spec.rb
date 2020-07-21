require 'rails_helper'

RSpec.describe 'TweetToResourceService' do
  subject {TweetToResourceService.new(tweet) }
  let(:tweet_with_url) {
    instance_double(Twitter::Tweet,
      id: 12345,
      full_text: "@bitcoinersbest add https://valid-url.com",
      user: tweet_author,
      urls?: true,
      urls: [double(expanded_url: 'https://valid-url.com')]
    )
  }
  let(:tweet_with_no_url ) { double('Twitter::Tweet', id: 23456, full_text: "@bitcoinersbest add a-non-url", user: tweet_author) }
  let(:tweet_with_book_and_author) {
    double('Twitter::Tweet', id: 34567, full_text: "@bitcoinersbest add book https://valid-url.com by @saifedean", user: tweet_author)
  }
  let(:tweet_with_book_title_and_author) {
    instance_double('Twitter::Tweet',
      id: 34567,
      full_text: "@bitcoinersbest add The Bitcoin Standard book https://valid-url.com by @saifedean",
      user: tweet_author
    )
  }
  let(:tweet_with_podcast_and_author) {
    double('Twitter::Tweet', id: 45678, full_text: "@bitcoinersbest add podcast https://valid-url.com by @citizenbitcoin", user: tweet_author)
  }
  let(:tweet_author) { Twitter::User.new(id: 24938383, screen_name: 'pablof7z') }

  describe '#title' do
    it 'gets a title when it is available' do
      expect(TweetToResourceService.new(tweet_with_book_title_and_author).title).to eq "The Bitcoin Standard"
    end

    it 'returns nil when there is no title available' do
      expect(TweetToResourceService.new(tweet_with_book_and_author).title).to be_nil
    end
  end

  describe '#type' do
    it 'returns the type when there is one provided' do
      expect(TweetToResourceService.new(tweet_with_book_and_author).type).to be Book
      expect(TweetToResourceService.new(tweet_with_book_title_and_author).type).to be Book
      expect(TweetToResourceService.new(tweet_with_podcast_and_author).type).to be Podcast
    end

    it 'returns nil when there is no type' do
      expect(TweetToResourceService.new(tweet_with_url).type).to be_nil
    end
  end

  describe '#url' do
    it 'returns the first url data' do
      expect(TweetToResourceService.new(tweet_with_url).url).to eq 'https://valid-url.com'
    end
  end

  describe '#submitter' do
    it 'returns the author of the tweet' do
      expect(TweetToResourceService.new(tweet_with_url).submitter).to eq 'pablof7z'
    end
  end

  describe '#author' do
    it 'is nil when not specified' do
      expect(TweetToResourceService.new(tweet_with_url).author).to be_nil
    end

    it 'retrieves the author when it is specified' do
      expect(TweetToResourceService.new(tweet_with_book_and_author).author).to eq '@saifedean'
    end
  end

  describe '#submitter_user' do
    let (:tweet_author_user) { User.create!(provider: 'twitter', uid: tweet_author.id, username: tweet_author.screen_name) }

    it 'fetches the user that matches the screen name' do
      tweet_author_user
      expect(TweetToResourceService.new(tweet_with_url).submitter_user).to eq tweet_author_user
    end

    it 'creates a new user if there is none with that screen name' do
      expect{ TweetToResourceService.new(tweet_with_url).submitter_user }.to change(User, :count).by(1)
    end
  end

  describe '#save' do
    it 'creates a resource' do
      expect { TweetToResourceService.new(tweet_with_url).save }.to change(Resource, :count).by(1)
    end

    it 'saves the tweet id' do
      expect(TweetToResourceService.new(tweet_with_url).save.submitted_via_tweet_id).to eq tweet_with_url.id.to_s
    end

    context 'with a type not specified' do
      let(:tweet) {
        instance_double(Twitter::Tweet,
          id: 12345,
          full_text: "@bitcoinersbest add https://valid-url.com by @saifedean",
          user: tweet_author,
          urls?: true,
          urls: [double(expanded_url: 'https://valid-url.com')]
        )
      }

      it 'creates the resource with no resourceable attached' do
        expect(subject.save.resourceable).to be_nil
      end

      it 'requests admin classification' do
        ActiveJob::Base.queue_adapter = :test
        subject.save
        expect(ResourcePendingClassificationNotifierJob).to have_been_enqueued
      end
    end

    context 'with a type specified' do
      let(:tweet) {
        instance_double(Twitter::Tweet,
          id: 12345,
          full_text: "@bitcoinersbest add book https://valid-url.com by @saifedean",
          user: tweet_author,
          urls?: true,
          urls: [double(expanded_url: 'https://valid-url.com')]
        )
      }

      it 'creates the resource with the proper type' do
        expect(
          subject.save.resourceable_type
        ).to eq 'Book'
      end

      it 'sets the author of the resource' do
        expect(
          subject.save.authors.map(&:name)
        ).to include '@saifedean'
      end
    end
  end
end
