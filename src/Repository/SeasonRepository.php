<?php

namespace App\Repository;

use App\Entity\Club;
use App\Entity\Player;
use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Season|null find($id, $lockMode = null, $lockVersion = null)
 * @method Season|null findOneBy(array $criteria, array $orderBy = null)
 * @method Season[]    findAll()
 * @method Season[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeasonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Season::class);
    }

    public function getAllSeasonForClub(Club $club): array
    {
        return $this->_em->createQueryBuilder()
            ->select('s')
            ->from(Season::class, 's')
            ->join('s.playerSeasonClubs', 'psc')
            ->andWhere('psc.club = :club')
            ->setParameter('club', $club)
            ->groupBy("s.id")
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllSeasonForPlayer(Player $player): array
    {
        return $this->_em->createQueryBuilder()
            ->select('s')
            ->from(Season::class, 's')
            ->join('s.playerSeasonClubs', 'psc')
            ->andWhere('psc.player = :player')
            ->setParameter('player', $player)
            ->groupBy("s.id")
            ->getQuery()
            ->getResult()
            ;
    }
}
