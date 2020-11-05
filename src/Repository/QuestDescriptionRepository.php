<?php

namespace App\Repository;

use App\Entity\QuestDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestDescription[]    findAll()
 * @method QuestDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestDescription::class);
    }

    // /**
    //  * @return QuestDescription[] Returns an array of QuestDescription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestDescription
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
