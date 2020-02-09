#!/usr/bin/env bash

if [ $1 == "build" ]
then
    docker-compose build
    docker-compose up -d

    echo "Waiting 30 seconds for container to boot..."
    sleep 30

    docker exec bitcoinersbest-rails rails db:create
    docker exec bitcoinersbest-rails rails db:migrate
    docker exec bitcoinersbest-rails bundle exec eye load eye.rb
    docker exec -d bitcoinersbest-rails bin/webpack-dev-server
fi

if [ $1 == "start" ]
then
    docker-compose up -d
    echo "Waiting 10 seconds for container to boot..."
    sleep 10
    docker exec bitcoinersbest-rails eye load eye.rb
    docker exec -d bitcoinersbest-rails bin/webpack-dev-server
fi

if [ $1 == "stop" ]
then
    set -e
    docker-compose stop
fi

if [ $1 == "destroy" ]
then
    set -e
    docker-compose down --volumes
fi
