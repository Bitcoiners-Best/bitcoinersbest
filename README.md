# Bitcoiners.best

## Building

This repo has been prepared to be ran with Docker. It has been tested on MacOS 10.15.

A script has been prepared to run the docker commands as follows:

```
bash docker.sh build
```

This command will build three docker containers:
* rails server
* postgresql server
* redis server

### Backend services

A backend service runs in the rails server. It connects to lnpay.co and polls for invoice settlement.

This backend service is handled via `eye` and automatically started in the `docker.sh` script. It can also be started
manually via:

#### Through eye
```
docker exec bitcoinersbest-rails eye load eye.rb
```

#### or manually
```
docker exec bitcoinersbest-rails rails runner services/transactions_monitor/main.rb
```

## Credentials

Multiple credentials are required to run, they are stored in the rails encrypted credentials file, which can be edited via:

```
docker exec -it bitcoinersbest-rails bash
# apt install vim # You might need to install an editor
# EDITOR=vim rails credentials:edit
```

The credentials should be a YAML that includes:

```yaml
lnpay:
  key: ... # public key from https://lnpay.co/dashboard/integrations
  secret: ... # secret key from https://lnpay.co/dashboard/integrations
  wallet: ... # wallet invoice access key, format will be wi_...

twitter:
  key: ... # twitter api key
  secret: ... # twitter secret key

secret_key_base: ... # A random string, can be created by running `rails secret`
```

### Twitter app settings

The twitter app, created in https://developer.twitter.com, should be enabled with OAuth access, providing a callback that points to
`http://localhost:3001/users/auth/twitter/callback`.

## Running

Right after building, the service will be accessible on http://localhost:3001/. The `docker.sh` script provides:

```
$ bash docker.sh start # Start docker container
$ bash docker.sh stop # Stop docker container
$ bash docker.sh destroy # Destroy docker containers
```

### Useful commands

```
docker exec -it bitcoinersbest-rails rails c # Access rails console
```
