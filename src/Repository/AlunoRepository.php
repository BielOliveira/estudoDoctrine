<?php


namespace Alura\Doctrine\Repository;


use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        /*$classAluno = Aluno::class;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT aluno, telefones, cursos from $classAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
        $query = $entityManager->createQuery($dql);*/

        $query = $this->createQueryBuilder('aluno')
            ->join('aluno.telefones', 'telefones')
            ->join('aluno.cursos', 'cursos')
            ->addSelect('telefones')
            ->addSelect('cursos')
            ->getQuery();

        return $query->getResult();
    }
}