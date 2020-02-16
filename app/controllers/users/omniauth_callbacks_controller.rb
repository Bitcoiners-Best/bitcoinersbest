class Users::OmniauthCallbacksController < Devise::OmniauthCallbacksController
  def lightning
    @user = User.from_omniauth(request.env["omniauth.auth"])

    if @user.persisted?
      sign_in_and_redirect @user, event: :authentication #this will throw if @user is not activated
      set_flash_message(:notice, :success, kind: "Lightning") if is_navigational_format?
    else
      redirect_to new_user_registration_url
    end
  end

  def twitter
    # You need to implement the method below in your model (e.g. app/models/user.rb)
    @user = User.from_omniauth(request.env["omniauth.auth"])

    if @user.persisted?
      sign_in_and_redirect @user, event: :authentication #this will throw if @user is not activated
      set_flash_message(:notice, :success, kind: "Twitter") if is_navigational_format?
    else
      session["devise.twitter_data"] = request.env["omniauth.auth"].except("extra")
      redirect_to new_user_registration_url
    end
  end

  def failure
    error_message = if request.env['omniauth.error'].try(:message)
      request.env['omniauth.error'].message
    else
      case request.env['omniauth.error.type']
      when :old_invoice then 'This invoice is too old, try again with a new one'
      when :invalid_invoice then "This invoice doesn't seem to be valid"
      when :invoice_without_required_text then "The invoice doesn't include the required text"
      when :custodial_wallet then "This invoice was generated from a custodial wallet, you need to use your own node to generate a valid invoice"
      else
        request.env['omniauth.error.type']
      end
    end

    set_flash_message! :alert, :failure, kind: OmniAuth::Utils.camelize(failed_strategy.name), reason: error_message

    redirect_to new_user_registration_url
  end
end
