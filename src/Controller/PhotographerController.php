<?php

namespace App\Controller;

use App\Entity\Photographer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotographerController extends AbstractController
{
    #[Route('/photographers/{id}/portfolio', name: 'app_photographer_portfolio')]
    public function index(Photographer $photographer): Response
    {
        dump($photographer);
        dump($photographer->getPortfolios());

        return $this->render('photographer/portfolio.html.twig', [
            'controller_name' => 'PhotographerController',
        ]);
    }
}
