static:
	php -S localhost:3000

dynamic:
	php -S localhost:3000 src/index.php

lint:
	composer exec 'phpcs  --standard=PSR2 src'

update:
	composer dump-autoload

install:
	composer install
