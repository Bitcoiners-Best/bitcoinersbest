Rails.application.routes.draw do
  resources :resources, only: [:new, :create] do
    resources :votes, only: [:new, :create, :destroy]
  end

  resources :podcasts, controller: :resources, type: 'podcast', only: [:index, :new, :create, :show]
  resources :episodes, controller: :resources, type: 'episode', only: [:index, :new, :create, :show]
  resources :articles, controller: :resources, type: 'article', only: [:index, :new, :create, :show]
  resources :books, controller: :resources, type: 'book', only: [:index, :new, :create, :show]
  resources :twitter_threads, controller: :resources, type: 'twitter_thread', only: [:index, :new, :create]
  resources :twitter_threads, type: 'twitter_thread', only: [:show]

  devise_for :users, controllers: { omniauth_callbacks: 'users/omniauth_callbacks' }

  get '/faq', to: 'pages#faq', as: :faq
  get '/terms', to: 'pages#terms', as: :terms
  get '/privacy', to: 'pages#privacy', as: :privacy
  root to: 'resources#index'
end
