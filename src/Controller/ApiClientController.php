<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiClientController extends AbstractController
{
    #[Route('/client', name: 'client')]
    public function index(ClientRepository $clientRepository, NormalizerInterface $normalizer): Response
    {
        $client = $clientRepository -> findAll();
        $clientNormalises = $normalizer->normalize($client, null, [
            'groups'=>'client'
        ]);
        $clientJson = json_encode($clientNormalises);
        $response = new Response($clientJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
