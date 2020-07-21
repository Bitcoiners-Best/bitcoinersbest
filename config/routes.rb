Rails.application.routes.draw do
  default_url_options protocol: 'https', host: "bitcoiners.best"

  authenticate :user, lambda { |u| u.admin? } do
    require 'sidekiq/web'
    mount Sidekiq::Web => '/sidekiq'
  end

  if Rails.env.development?
    require 'mr_video'
    mount MrVideo::Engine => '/mr_video'
  end

  namespace :admin do
    resources :users
    resources :articles
    resources :votes
    resources :books
    resources :twitter_threads
    resources :resources
    resources :episodes
    resources :podcasts
    resources :projects
    resources :donations

    root to: "users#index"
  end

  resources :resources, only: [:new, :create] do
    resources :votes, only: [:new, :create, :destroy]
    get :classify, on: :member, as: :classify
    post :classify, on: :member
  end

  %w(all).each do |time_scope|
    get "/#{time_scope}", to: 'resources#index', time_scope: time_scope

    Resource::CATEGORIES.each_key do |name|
      get "/#{name.to_s.pluralize}/#{time_scope}", to: 'resources#index', type: name.to_s, time_scope: time_scope
    end
  end

  resources :podcasts, controller: :resources, type: 'podcast', only: [:index, :new, :create, :show]
  resources :episodes, controller: :resources, type: 'episode', only: [:index, :new, :create, :show]
  resources :articles, controller: :resources, type: 'article', only: [:index, :new, :create, :show]
  resources :books, controller: :resources, type: 'book', only: [:index, :new, :create, :show]
  resources :twitter_threads, controller: :resources, type: 'twitter_thread', only: [:index, :new, :create]
  resources :twitter_threads, type: 'twitter_thread', only: [:show]
  resources :projects, controller: :resources, type: 'project', only: [:new, :create]
  resources :projects, only: :show
  get '/vote', to: 'projects#index', as: :vote
  resources :donations, only: [:index, :show]

  devise_for :users, controllers: {
    omniauth_callbacks: 'users/omniauth_callbacks',
    registrations: 'users/registrations'
  }, path: '', path_names: { sign_in: 'login', sign_up: 'register', sign_out: 'logout' }

  resources :users, only: [:show]
  get '/profile', to: 'users#show', as: :user_profile

  get '/faq', to: 'pages#faq', as: :faq
  get '/terms', to: 'pages#terms', as: :terms
  get '/privacy', to: 'pages#privacy', as: :privacy
  root to: 'resources#index'
end
