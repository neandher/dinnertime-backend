<?php

namespace App\Repository;

use App\Entity\TipoReserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoReserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoReserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoReserva[]    findAll()
 * @method TipoReserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoReservaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoReserva::class);
    }

    // /**
    //  * @return TipoReserva[] Returns an array of TipoReserva objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoReserva
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
