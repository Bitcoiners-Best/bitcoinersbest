require 'rest-client'

class LnpayService
  class << self
    SECRET = Rails.application.credentials.dig(:lnpay, :secret)
    WALLET = Rails.application.credentials.dig(:lnpay, :wallet)
    URL = "https://#{SECRET}@lnpay.co".freeze

    def create_invoice(amount, description)
      response = RestClient.post("#{URL}/v1/wallet/#{WALLET}/invoice", {
        memo: description,
        num_satoshis: amount,
      })

      JSON.parse(response.body)
    end

    def get_transactions
      response = RestClient.get("#{URL}/v1/wallet/#{WALLET}/transactions")

      JSON.parse(response.body)
    end
  end
end
