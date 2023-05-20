hello:
	@echo "Hello!!!"

up:
	cd docker && docker-compose up

clean-cache:
	@rm -rf apps/*/*/var
	@docker exec home-flow-php ./apps/realestate/backend/bin/console cache:warmup
	@docker exec home-flow-php ./apps/mortgage/backend/bin/console cache:warmup

composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

.PHONY: test
test: composer-env-file
	docker exec qm-php ./vendor/bin/phpunit

phpstan:
	vendor/bin/phpstan analyse --level 8 --error-format=table --configuration phpstan.neon.dist src/ tests/
