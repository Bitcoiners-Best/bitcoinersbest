FROM ruby:2.6.4
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y curl apt-transport-https apt-utils libpq-dev wget yarn nodejs postgresql-client imagemagick
WORKDIR /myapp
ADD Gemfile /myapp/Gemfile
ADD Gemfile.lock /myapp/Gemfile.lock
RUN gem install rails bundler
ADD . /myapp
RUN bundle install --without test
RUN rails yarn:install

# Add a script to be executed every time the container starts.
ADD entrypoint.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]
EXPOSE 3001

# Start the main process.
CMD ["bundle", "exec", rails", "server", "-b", "0.0.0.0", "-p", "3001"]
