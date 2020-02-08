Rails.application.routes.draw do
  resources :resources, only: [:new, :create] do
    resources :votes, only: [:new, :create, :destroy]
  end

  Resource::CATEGORIES.each_key do |category|
    plural = category.to_s.pluralize
    resources plural, controller: :resources, type: category, only: [:index, :new, :create, :show]
  end

  devise_for :users, controllers: { omniauth_callbacks: 'users/omniauth_callbacks' }

  get '/faq', to: 'pages#faq', as: :faq
  root to: 'resources#index'
end
