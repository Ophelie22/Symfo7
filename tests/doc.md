Pour lancer les tests :

se placer dans le contenair php:

docker compose exec php bash

et lancer les tests :
php bin/phpunit --filter testImportJeanPaul tests/TechnicalTest.php
