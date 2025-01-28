<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiUtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'utilisateur')]
    public function index(UtilisateurRepository $utilisateurRepository, NormalizerInterface $normalizer): Response
    {
        $utilisateur = $utilisateurRepository -> findAll();
        $utilisateurNormalises = $normalizer->normalize($utilisateur, null, [
            'groups'=>'utilisateur'
        ]);
        $utilisateurJson = json_encode($utilisateurNormalises);
        $response = new Response($utilisateurJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
