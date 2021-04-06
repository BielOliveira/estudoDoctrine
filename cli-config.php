<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Alura\Doctrine\Helper\EntityManagerFactory;

// replace with file to yout own project boostrap
require_once __DIR__."/vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);