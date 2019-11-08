#!/usr/bin/env bash
docker exec -t bitcoinersbest-php bash composer install --no-interaction
docker exec bitcoinersbest-php php yii migrate --migrationPath=migrations/test --interactive=0
