<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiegeControlleController extends AbstractController
{
    #[Route('/siege/controlle', name: 'app_siege_controlle')]
    public function index(): Response
    {
        return $this->render('siege_controlle/index.html.twig', [
            'controller_name' => 'SiegeControlleController',
        ]);
    }
}
