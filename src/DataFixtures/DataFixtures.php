<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\Logo;
use App\Entity\Player;
use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
use App\Repository\PlayerSeasonClubRepository;
use App\Security\LoginFormAuthenticator;
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

        $logo = new Logo();
        $logo
            ->setName("Logo1")
            ->setFileName("image/rcs.png")
            ->setStart(\DateTime::createFromFormat("j-m-Y", "21-08-2020"))
            ->setEnd(\DateTime::createFromFormat("j-m-Y", "23-05-2021"))
        ;

        $logo2 = new Logo();
        $logo2
            ->setName("Logo2")
            ->setFileName("image/rsc.png")
            ->setStart(\DateTime::createFromFormat("j-m-Y", "21-08-2020"))
            ->setEnd(\DateTime::createFromFormat("j-m-Y", "23-05-2021"))
        ;


        $club = new Club();
        $club
            ->setName("RCS")
            ->setLogo($logo)
        ;

        $club2 = new Club();
        $club2
            ->setName("FC Colmar")
            ->setLogo($logo2)
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

        $playerSeasonClub0 = new PlayerSeasonClub();
        $playerSeasonClub0
            ->setNumber(11)
            ->setGoals(2)
            ->setPlayer($player)
            ->setClub($club2)
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
        $manager->persist($logo);
        $manager->persist($logo2);
        $manager->persist($club);
        $manager->persist($club2);
        $manager->persist($season);
        $manager->persist($season2);
        $manager->persist($playerSeasonClub);
        $manager->persist($playerSeasonClub0);
        $manager->persist($playerSeasonClub2);
        $manager->persist($playerSeasonClub3);
        $manager->flush();
    }
}
