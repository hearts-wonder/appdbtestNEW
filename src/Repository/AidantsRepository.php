<?php

namespace App\Repository;

use App\Entity\AidantsArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AidantsArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AidantsArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AidantsArticle[]    findAll()
 * @method AidantsArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AidantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AidantsArticle::class);
    }

    // /**
    //  * @return AidantsArticle[] Returns an array of AidantsArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AidantsArticle
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
