<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Process\Process;

require dirname(__DIR__) . '/vendor/autoload.php';

if (file_exists(dirname(__DIR__) . '/config/bootstrap.php')) {
    require dirname(__DIR__) . '/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');
}

// Créer et initialiser la base de données de test
$process = new Process(['php', 'bin/console', 'doctrine:database:drop', '--force', '--env=test']);
$process->run();

$process = new Process(['php', 'bin/console', 'doctrine:database:create', '--env=test']);
$process->run();

$process = new Process(['php', 'bin/console', 'doctrine:schema:create', '--env=test']);
$process->run();
