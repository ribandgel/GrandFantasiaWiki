<?php

namespace App\Repository;

use App\Entity\TalentCombination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TalentCombination|null find($id, $lockMode = null, $lockVersion = null)
 * @method TalentCombination|null findOneBy(array $criteria, array $orderBy = null)
 * @method TalentCombination[]    findAll()
 * @method TalentCombination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TalentCombinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TalentCombination::class);
    }

    // /**
    //  * @return TalentCombination[] Returns an array of TalentCombination objects
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
    public function findOneBySomeField($value): ?TalentCombination
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
