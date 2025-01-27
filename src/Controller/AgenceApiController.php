<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api", name:"api_")]
final class AgenceApiController extends AbstractController
{
    #[Route('/agence', name: 'agence',  methods:('GET'))]
    public function index(): Response
    {
        return $this->render('agence_api/index.html.twig', [

        ]);
    }
}
