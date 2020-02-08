BASE = File.dirname(__FILE__)

Eye.config do
  logger "#{BASE}/log/eye.log"
end

Eye.application 'bitcoinersbest' do
  env 'RAILS_ENV' => 'development'

  process 'transactions_monitor' do
    working_dir BASE
    pid_file "#{BASE}/tmp/pids/transactions_monitor.pid"
    start_command "bundle exec rails runner services/transactions_monitor/main.rb"
    daemonize true
    stdall "#{BASE}/log/transactions_monitor.log"
  end
end
