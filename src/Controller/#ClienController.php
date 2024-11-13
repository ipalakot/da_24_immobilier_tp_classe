<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClienController extends AbstractController
{
    #[Route('/clien', name: 'app_clien')]
    public function index(): Response
    {
        return $this->render('clien/index.html.twig', [
            'controller_name' => 'ClienController',
        ]);
    }
}
