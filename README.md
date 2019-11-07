# Bitcoiners Best

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         contains wrappers for 3rd party plugins, plus some helpers
      config/             contains application configurations
      controllers/        contains Web controller classes
      environments/       contains environment files (this is almost deprecated in favor of .env file)
      mail/               contains view files for e-mails
      migrations/         contains database migration files
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/                  contains various tests for the basic application
      vendor/                 contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
      widgets/            contains one widget Alert.php not sure why Yii has it like this



REQUIREMENTS
------------

DOCKER. Everything is tested and working on `MacOS 10.14.6` with `Docker 19.03.2` and `Docker Compose 1.24.1`


INSTALLATION
------------

### Install with Docker

Fork repo and then clone

    $ git clone https://github.com/<your-user>/bitcoinersbest
    $ git remote add upstream https://github.com/paywall-ln/bitcoinersbest

Run the build script

    $ bash docker.sh build
    
Add the following line to your `/etc/hosts` file

    127.0.0.1 bitcoinersbest.local
    
You can then access the application through the following URL:

    http://bitcoinersbest.local:9111
   
### Starting / Stopping / Destroying Docker containers
    $ bash docker.sh start # Start docker container
    $ bash docker.sh stop # Stop docker container
    $ bash docker.sh destroy # Destroy docker containers

### Accessing docker containers
    $ docker exec -it bitcoinersbest-php bash
    $ docker exec -it bitcoinersbest-db bash

### Accessing local mysql database
   `bitcoinersbest.local:21222` with user/pass `root/example`
   
### Accessing local mysql database

Database migrations should be run often to pull in database changes from other devs.
      
      $ docker exec -t bitcoinersbest-php php yii migrate --interactive=0
    
**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### .env file

There is a `.env.example` file that is automatically copied over as `.env` on first build. This file contains the environment specific config vars. Here is an example

```
############## DEVELOPMENT ENVIRONMENT DEFAULTS

# Yii Settings
YII_DEBUG=true
YII_ENV=dev

# Database
DB_HOST=192.168.21.22
DB_USER=root
DB_PASS=example
DB_DB=paywall_db

# URL Stuff
BASE_URL=http://bitcoinersbest.local:9111

# Email - if DEV emails are sent to files in /runtime/mail
DEFAULT_EMAIL_HOST=
DEFAULT_EMAIL_PORT=
DEFAULT_EMAIL_USERNAME=
DEFAULT_EMAIL_PASSWORD=

TWITTER_CONSUMER_KEY=
TWITTER_CONSUMER_SECRET=
```

TESTING (work in progress)
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 
