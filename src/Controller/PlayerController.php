<?php


namespace App\Controller;


use App\Entity\Club;
use App\Entity\Player;
use App\Entity\PlayerSeasonClub;
use App\Entity\Season;
use App\Service\PlayerManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    /**
     * @Route("/show-player", name="app_show_player")
     */
    public function show(Request $request, EntityManagerInterface $em, PlayerManager $playerManager)
    {
        $club = $em->getRepository(Club::class)->find($request->get("club_id"));
        $season = $em->getRepository(Season::class)->find($request->get("season_id"));
        $player = $em->getRepository(Player::class)->find($request->get("player_id"));
        $playerSeasonsClub = $em->getRepository(PlayerSeasonClub::class)->findClubAndStatsBySeason($season);
        $seasonChoices = $playerManager->getArrayOfSeasonsForPlayer($player);
        return $this->render("player/show.html.twig", [
            'club' => $club,
            'season' => $season,
            'player' => $player,
            'playerSeasonsClub' => $playerSeasonsClub,
            'seasons' => $seasonChoices
        ]);
    }
}