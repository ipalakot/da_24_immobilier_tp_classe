<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AgenceApiController extends AbstractController
{
    #[Route('/agence/api', name: 'app_agence_api')]
    public function index(): Response
    {
        return $this->render('agence_api/index.html.twig', [

        ]);
    }
}
