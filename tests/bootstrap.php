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

// À la fin du fichier bootstrap.php
// Vérifier si les données existent déjà
$kernel = new \App\Kernel('test', true);
$kernel->boot();
$container = $kernel->getContainer();
$entityManager = $container->get('doctrine')->getManager();
$freelances = $entityManager->getRepository(\App\Entity\Freelance::class)->findAll();

if (count($freelances) === 0) {
    // Insérer des données de test directement
    $freelance = new \App\Entity\Freelance();
    $entityManager->persist($freelance);

    $freelanceJeanPaul = new \App\Entity\FreelanceJeanPaul();
    $freelanceJeanPaul->setFirstName('Jean');
    $freelanceJeanPaul->setLastName('Test');
    $freelanceJeanPaul->setJobTitle('Testeur');
    $freelanceJeanPaul->setJeanPaulId(999);
    $freelanceJeanPaul->setCreatedAt(new \DateTime());
    $freelanceJeanPaul->setUpdatedAt(new \DateTime());
    $freelanceJeanPaul->setFreelance($freelance);

    $entityManager->persist($freelanceJeanPaul);
    $entityManager->flush();

    echo "Données de test générées pour Freelance\n";
}
