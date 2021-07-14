<?php


namespace App\Controller;


use App\Entity\Club;
use App\Service\ClubManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Require ROLE_USER for *every* controller method in this class.
 * @IsGranted("ROLE_USER")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ClubManager $clubManager)
    {
        $datas = $clubManager->getClubsWithArrayOfSeasons();
        return $this->render("home/index.html.twig", [
            'datas' => $datas
        ]);
    }
}