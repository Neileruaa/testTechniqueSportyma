<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\Player;
use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
use App\Repository\PlayerSeasonClubRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $player = new Player();
        $player
            ->setFirstName("Aurélien")
            ->setName("DREY")
        ;

        $player2 = new Player();
        $player2
            ->setFirstName("Truc")
            ->setName("Machin")
        ;

        $club = new Club();
        $club
            ->setName("RCS")
        ;

        $season = new Season();
        $season
            ->setStart(\DateTime::createFromFormat("j-m-Y", "21-08-2020"))
            ->setEnd(\DateTime::createFromFormat("j-m-Y", "23-05-2021"))
        ;

        $season2 = new Season();
        $season2
            ->setStart(\DateTime::createFromFormat("j-m-Y", "21-08-2021"))
            ->setEnd(\DateTime::createFromFormat("j-m-Y", "23-05-2022"))
        ;

        $playerSeasonClub = new PlayerSeasonClub();
        $playerSeasonClub
            ->setNumber(10)
            ->setGoals(35)
            ->setPlayer($player)
            ->setClub($club)
            ->setSeason($season)
        ;

        $playerSeasonClub2 = new PlayerSeasonClub();
        $playerSeasonClub2
            ->setNumber(9)
            ->setGoals(0)
            ->setPlayer($player2)
            ->setClub($club)
            ->setSeason($season)
        ;

        $playerSeasonClub3 = new PlayerSeasonClub();
        $playerSeasonClub3
            ->setNumber(9)
            ->setGoals(0)
            ->setPlayer($player2)
            ->setClub($club)
            ->setSeason($season2)
        ;


        $manager->persist($player);
        $manager->persist($player2);
        $manager->persist($club);
        $manager->persist($season);
        $manager->persist($season2);
        $manager->persist($playerSeasonClub);
        $manager->persist($playerSeasonClub2);
        $manager->persist($playerSeasonClub3);
        $manager->flush();
    }
}
