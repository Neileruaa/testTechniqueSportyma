<?php

namespace App\Repository;

use App\Entity\Club;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Club|null find($id, $lockMode = null, $lockVersion = null)
 * @method Club|null findOneBy(array $criteria, array $orderBy = null)
 * @method Club[]    findAll()
 * @method Club[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Club::class);
    }


//    public function findClubsWithFilteredSeasons()
//    {
//        return $this->createQueryBuilder('c')
//            ->select(['c.name', 'MIN(c.id)', 'MIN(s.id)'])
//            ->join('c.playerSeasonClubs', 'psc')
//            ->join('psc.season', 's')
//            ->groupBy('c.name')
////            ->addGroupBy('s.id')
//            ->getQuery()
//            ->getResult()
//        ;
//    }
}
