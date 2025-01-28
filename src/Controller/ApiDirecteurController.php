<?php

namespace App\Controller;

use App\Repository\DirecteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiDirecteurController extends AbstractController
{
    #[Route('/directeur', name: 'directeur')]
    public function index(DirecteurRepository $directeurRepository, NormalizerInterface $normalizer): Response
    {
        $directeur = $directeurRepository -> findAll();
        $directeurNormalises = $normalizer->normalize($directeur, null, [
            'groups'=>'directeur'
        ]);
        $directeurJson = json_encode($directeurNormalises);
        $response = new Response($directeurJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
