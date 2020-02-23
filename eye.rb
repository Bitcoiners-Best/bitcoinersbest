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

  process 'sidekiq' do
    working_dir BASE
    rails_env = env['RAILS_ENV']
    start_command "sidekiq -e #{rails_env} -C ./config/sidekiq.yml"
    pid_file "tmp/pids/#{name}.pid"
    stdall "log/#{name}.log"
    daemonize true
    stop_signals [:USR1, 0, :TERM, 10.seconds, :KILL]

    check :cpu, every: 30, below: 100, times: 5
    check :memory, every: 30, below: 300.megabytes, times: 5
  end
end
