<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Aluno;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idAulo = $argv[1];
$idCurso = $argv[2];

/** @var Curso $curso */
$curso = $entityManager->find(Curso::class, $idCurso);
/** @var Aluno $aluno */
$aluno = $entityManager->find(Aluno::class, $idAulo);

$aluno->addCurso($curso);

$entityManager->flush();
