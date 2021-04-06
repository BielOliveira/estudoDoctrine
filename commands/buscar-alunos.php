<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Telefone;

require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//$alunoRepository = $entityManager->getRepository(Aluno::class);
//$alunoList = $alunoRepository->findAll();

$query = $entityManager->createQuery("SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno");
$alunosList = $query->getResult();

foreach ($alunosList as $aluno){
    $telefones = $aluno
    ->getTelefones()
    ->map(function (Telefone $telefone){
        return $telefone->getNumero();
    })
    ->toArray();
    
    echo "ID: {$aluno->getId()} \n Nome: {$aluno->getNome()}\n";
    echo "Telefones: ".implode(", " , $telefones);
    echo "\n \n";
}