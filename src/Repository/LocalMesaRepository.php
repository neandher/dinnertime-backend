<?php

namespace App\Repository;

use App\Entity\LocalMesa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LocalMesa|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocalMesa|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocalMesa[]    findAll()
 * @method LocalMesa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalMesaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LocalMesa::class);
    }

    // /**
    //  * @return LocalMesa[] Returns an array of LocalMesa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocalMesa
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
