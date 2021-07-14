<?php

namespace App\Repository;

use App\Entity\PlayerSeasonClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerSeasonClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerSeasonClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerSeasonClub[]    findAll()
 * @method PlayerSeasonClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerSeasonClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerSeasonClub::class);
    }

    // /**
    //  * @return PlayerSeasonClub[] Returns an array of PlayerSeasonClub objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerSeasonClub
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
