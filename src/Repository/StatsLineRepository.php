<?php

namespace App\Repository;

use App\Entity\StatsLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatsLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatsLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatsLine[]    findAll()
 * @method StatsLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatsLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatsLine::class);
    }

    // /**
    //  * @return StatsLine[] Returns an array of StatsLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatsLine
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
