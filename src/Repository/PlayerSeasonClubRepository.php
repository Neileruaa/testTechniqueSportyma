<?php

namespace App\Repository;

use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
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

    public function findClubAndStatsBySeason(Season $season)
    {
        return
            $this->_em->createQueryBuilder()
            ->select('psc, c')
            ->from(PlayerSeasonClub::class, 'psc')
            ->join('psc.club', 'c')
            ->andWhere('psc.season = :season')
            ->setParameter('season', $season)
            ->getQuery()
            ->getResult()
        ;
    }
}
