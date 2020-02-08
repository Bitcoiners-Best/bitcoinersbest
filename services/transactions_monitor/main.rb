require 'rest-client'

loop do
  transactions = LnpayService.get_transactions

  transactions.each do |tx|
    vote = Vote.where(payment_id: tx['lnTx']['id']).first

    next unless vote

    if !vote.settled?
      puts "found a new settled vote"
      vote.update(settled: true)
    else
      break
    end
  end

  sleep(1)
end
