<?php


namespace App\Service;


use App\Entity\Player;
use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
use Doctrine\ORM\EntityManagerInterface;

class PlayerManager
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getArrayOfSeasonsForPlayer(Player $player): array
    {
        return $this->em->getRepository(Season::class)->getAllSeasonForPlayer($player);
    }

}