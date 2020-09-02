<?php

namespace App\Repository;

use App\Entity\BarberProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BarberProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarberProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarberProduct[]    findAll()
 * @method BarberProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarberProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarberProduct::class);
    }

    // /**
    //  * @return BarberProduct[] Returns an array of BarberProduct objects
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
    public function findOneBySomeField($value): ?BarberProduct
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
