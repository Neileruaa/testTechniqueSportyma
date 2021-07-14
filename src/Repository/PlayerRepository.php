<?php

namespace App\Repository;

use App\Entity\Club;
use App\Entity\Player;
use App\Entity\Season;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Player|null find($id, $lockMode = null, $lockVersion = null)
 * @method Player|null findOneBy(array $criteria, array $orderBy = null)
 * @method Player[]    findAll()
 * @method Player[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    public function findPlayerByClubAndSeason(Club $club, Season $season)
    {
        return $this->createQueryBuilder('p')
            ->join("p.playerSeasonClubs", "psc")
            ->andWhere('psc.club = :club')
            ->setParameter('club', $club)
            ->andWhere('psc.season = :season')
            ->setParameter('season', $season)
            ->getQuery()
            ->getResult()
        ;
    }

}
