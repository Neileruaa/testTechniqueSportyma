<?php


namespace App\Service;


use App\Entity\Club;
use App\Entity\Season;
use Doctrine\ORM\EntityManagerInterface;

class ClubManager
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getClubsWithArrayOfSeasons(): array
    {
        $arr = [];
        $clubs = $this->em->getRepository(Club::class)->findAll();
        /** @var Club $club */
        foreach ($clubs as $club) {
            $arr[] = $this->createArrayForClub($club);
        }
        return $arr;
    }

    private function createArrayForClub(Club $club): array
    {
        return [
            'club' => $club,
            'seasons' => $this->createArrayOfSeasons($club)
        ];
    }

    private function createArrayOfSeasons(Club $club): array
    {
        return $this->em->getRepository(Season::class)->getAllSeasonForClub($club);
    }

    public function getArrayOfSeasonsForClub(Club $club):array
    {
        return $this->createArrayOfSeasons($club);
    }
}