<?php

namespace App\Repository;

use App\Entity\ActusArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ActusArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActusArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActusArticle[]    findAll()
 * @method ActusArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActusArticle::class);
    }

    // /**
    //  * @return ActusArticle[] Returns an array of ActusArticle objects
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
    public function findOneBySomeField($value): ?ActusArticle
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
