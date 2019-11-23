#!/usr/bin/env bash

if [ $1 == "build" ]
then
    cp .env-example .env

    docker-compose run --rm php composer update --prefer-dist
    docker-compose run --rm php composer install

    docker-compose up -d

    echo "Waiting 10 seconds for db container to boot..."
    sleep 10

    docker exec bitcoinersbest-php php yii migrate --interactive=0
    docker exec bitcoinersbest-php php yii migrate --migrationPath=migrations/test --interactive=0

    docker exec bitcoinersbest-php apt-get update
    docker exec bitcoinersbest-php apt-get -y install curl gnupg wget
    docker exec bitcoinersbest-php wget -O /tmp/setup_13.x https://deb.nodesource.com/setup_13.x
    docker exec bitcoinersbest-php bash /tmp/setup_13.x
    docker exec bitcoinersbest-php apt-get -y install nodejs
    docker exec bitcoinersbest-php npm install
    docker exec bitcoinersbest-php npm run dev
    docker exec bitcoinersbest-php rm -rf setup_13.x


fi

if [ $1 == "start" ]
then
    docker-compose up -d
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