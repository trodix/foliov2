<?php

namespace App\Repository;

use App\Entity\WatchArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WatchArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method WatchArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method WatchArticle[]    findAll()
 * @method WatchArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WatchArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WatchArticle::class);
    }

    // /**
    //  * @return WatchArticle[] Returns an array of WatchArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WatchArticle
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
