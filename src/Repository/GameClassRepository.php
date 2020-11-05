<?php

namespace App\Repository;

use App\Entity\GameClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameClass[]    findAll()
 * @method GameClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameClass::class);
    }

    // /**
    //  * @return GameClass[] Returns an array of GameClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GameClass
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
