require 'rails_helper'

RSpec.describe 'TwitterThread' do
  let(:tweet_url) { 'https://twitter.com/matt_odell/status/1225169242510647296' }
  subject { TwitterThread.new(url: tweet_url) }

  describe '.initialize' do
    it 'adds the tweet text as the title' do
      expect(subject.title).to_not be_empty
    end

    it 'adds the tweet created_by' do
      expect(subject.created_by).to eq('@matt_odell')
    end

    it "doesn't overwrite the title if one was given" do
      t = TwitterThread.new(url: tweet_url, title: 'a')
      expect(t.title).to eq('a')
    end

    it 'adds an image to the tweet' do
      expect(subject.image.attached?).to be true
    end

    it "doesn't overwrite the title if one was given" do
      subject.title = 'my own title'
      expect{subject.save!}.to_not change(subject, :title)
    end
  end

  describe '.valid?' do
    context 'with an invalid url' do
      let(:tweet_url) { 'http://twitter.com/something' }

      it 'fails validation' do
        subject.valid?
        expect(subject.errors.full_messages_for(:url)).to include("Url doesn't point to a valid tweet")
      end
    end

    context 'with a valid url' do
      it 'succeeds validation' do
        subject.valid?
        expect(subject.errors.full_messages_for(:url)).to be_empty
      end
    end
  end
end
