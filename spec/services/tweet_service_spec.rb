require 'rails_helper'

RSpec.describe 'TweetService' do
  let(:tweet_url) { 'https://twitter.com/matt_odell/status/1225169242510647296' }
  subject { TweetService.new(tweet_url) }

  it 'raises an error when the URL is not of a tweet' do
    expect {
      TweetService.new('http://google.com')
    }.to raise_error(TweetService::InvalidResource)
  end




  describe '.text' do
    it 'returns the text of the tweet' do
      expect(subject.text).to include("Shotgun KYC")
    end
  end




  describe '.image' do
    context 'when there are no images associated with the tweet' do
      let(:tweet_url) { 'https://twitter.com/matt_odell/status/941700770763812864' }

      it 'returns the profile picture' do
        expect(subject).to receive(:profile_image)
        subject.image
      end
    end

    context 'when there is an image associated with the tweet' do
      it 'returns the tweet image' do
        expect(subject.image).to eq('http://pbs.twimg.com/media/EQCs7U4U0AAMA25.jpg')
      end
    end
  end
end

