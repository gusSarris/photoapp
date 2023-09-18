<?php

namespace App\Controller;

use App\Entity\Photographer;
use App\Repository\PhotographerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(PhotographerRepository $photographer): Response
    {
        $photographers=$photographer->getRandomPhotographers();
        return $this->render('pages/main/index.html.twig', [
            'photographers' => $photographers,
        ]);
    }
}
