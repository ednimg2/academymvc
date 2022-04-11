UNAME_S := $(shell uname -s)

.PHONY: default
default: help

.PHONY: help
help: ## Get this help
	@echo Tasks:
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: build
build: ## Build using cache
	docker network create --driver bridge  mg_local_network || true
	[ ! -f ./.env ] && cp ./.env.dist ./.env || echo ".env file exists, skipping"
	docker-compose up --build --no-start

.PHONY: start
start: ## Start containers
	docker-compose up -d

.PHONY: up
up: ## Start containers
	docker-compose up

.PHONY: upd
upd: start ## Start containers in background

.PHONY: stop
stop: ## Remove containers
	docker-compose down

.PHONY: down
down: stop ## Remove containers

.PHONY: php
php: start ## Enters the hhshop-php-fpm container
	docker-compose exec academy-php-fpm bash

.PHONY: nginx
nginx: start ## Enters the hhshop-nginx container
	docker-compose exec academy-nginx bash
