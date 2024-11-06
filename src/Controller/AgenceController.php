<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AgenceController extends AbstractController
{
    #[Route('/agences', name: 'app_agence')]
    public function index(AgenceRepository $agenceRepository): Response
    {
        return $this->render('agence/index.html.twig', [
            'controller_name' => 'AgenceController',
            'agences' => $agenceRepository->findAll(),
        ]);
    }
}
