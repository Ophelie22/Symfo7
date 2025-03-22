Pour lancer les tests :

se placer dans le contenair php:

docker compose exec php bash

et lancer les tests :
php bin/phpunit --filter testImportJeanPaul tests/TechnicalTest.php
php bin/phpunit --filter testNormalizeFreelance tests/TechnicalTest.php
php bin/phpunit --filter testImportJeanPaul tests/TechnicalTest.php
php bin/phpunit --filter testGetFreelanceDetail tests/TechnicalTest.php
php bin/phpunit --filter testElasticSearchBasicSearch tests/TechnicalTest.php
php bin/phpunit --filter testElasticSearchBasicSearchWithSerializer tests/TechnicalTest.php
php bin/phpunit --filter testConnector tests/TechnicalTest.php
php bin/phpunit --filter testFindFirstName tests/TechnicalTest.php

docker-compose exec php bash

# Lister tous les index

curl -X GET "elasticsearch:9200/\_cat/indices?v"

php bin/console app:consolidate:freelance
php bin/console app:freelance:detail 1
