<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiAgenceController extends AbstractController
{
    #[Route('/agence', name: 'agence',  methods:('GET'))]
    public function index(AgenceRepository $agenceRepository, NormalizerInterface $normalizer): Response
    {
        $agence = $agenceRepository -> findAll();
        $agenceNormalises = $normalizer->normalize($agence, null, [
            'groups'=>'agence'
        ]);
        $agenceJson = json_encode($agenceNormalises);
        $response = new Response($agenceJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
