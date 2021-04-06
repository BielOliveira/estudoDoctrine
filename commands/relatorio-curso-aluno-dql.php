<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Entity\Curso;
use Doctrine\DBAL\Logging\DebugStack;
require_once __DIR__.'/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunosRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$classAluno = Aluno::class;
$dql = "SELECT aluno, telefones, cursos from $classAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
$query = $entityManager->createQuery($dql);
/**
 * @var Aluno[] $alunosList
 */
$alunosList = $query->getResult();

foreach ($alunosList as $aluno) {
    $telefones = $aluno
    ->getTelefones()
    ->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })
    ->toArray();
    
    echo "Id: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: ".implode(", ", $telefones)."\n";
    /** @var Curso[] $cursos */
    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso) {
        echo "\tID: {$curso->getId()}\n";
        echo "\tNome: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}
echo "\n";

foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql']."\n";
}