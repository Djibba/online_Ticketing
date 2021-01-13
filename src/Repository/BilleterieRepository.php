<?php

namespace App\Repository;

use App\Entity\Billeterie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Billeterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Billeterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Billeterie[]    findAll()
 * @method Billeterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BilleterieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Billeterie::class);
    }

    // /**
    //  * @return Billeterie[] Returns an array of Billeterie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Billeterie
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
