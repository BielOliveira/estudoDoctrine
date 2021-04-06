<?php
namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerFactory
{
    /**
     * 
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManager
    {
        $rootDir = __DIR__.'/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir.'/src'],
            true 
        );
        /* Para MySQL
        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'curso_doctrine',
            'user' => 'root',
            'password' => 'senhalura'
        ];
        */
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir.'/var/data/banco.sqlite'
        ];
        return EntityManager::create($connection, $config);
    }
}

