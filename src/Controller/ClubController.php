<?php


namespace App\Controller;


use App\Entity\Club;
use App\Entity\Player;
use App\Entity\Season;
use App\Service\ClubManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/show-club", name="app_show_club")
     */
    public function show(Request $request, EntityManagerInterface $em, ClubManager $clubManager)
    {
        $club = $em->getRepository(Club::class)->find($request->get("club_id"));
        $season = $em->getRepository(Season::class)->find($request->get("season_id"));
        $players = $em->getRepository(Player::class)->findPlayerByClubAndSeason($club, $season);
        $seasonChoices = $clubManager->getArrayOfSeasonsForClub($club);
        return $this->render("club/show.html.twig", [
            'players' => $players,
            'club' => $club,
            'season' => $season,
            'seasons' => $seasonChoices
        ]);
    }
}