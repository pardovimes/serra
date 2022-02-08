build:
	docker-compose build
start:
	docker-compose up -d --no-build --remove-orphans --force-recreate
shell:
	docker exec -it serra_php_fpm bash
