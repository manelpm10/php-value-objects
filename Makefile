.PHONY: build
build:
	docker build -t php-value-objects -f "$$PWD/docker/Dockerfile" .

.PHONY: run
run:
	docker run -it php-value-objects bash

.PHONY: test
test: build
	docker run -it --rm \
		-v "$$PWD/src":/opt/php-value-objects/src \
		-v "$$PWD/tests":/opt/php-value-objects/tests \
		-v "$$PWD/phpunit.xml.dist":/opt/php-value-objects/phpunit.xml \
		-w /opt/php-value-objects \
		php-value-objects \
		php bin/phpunit