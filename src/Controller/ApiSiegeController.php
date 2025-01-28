<?php

namespace App\Controller;

use App\Repository\SiegeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiSiegeController extends AbstractController
{
    #[Route('/siege', name: 'siege')]
    public function index(SiegeRepository $siegeRepository, NormalizerInterface $normalizer): Response
    {
        $siege = $siegeRepository -> findAll();
        $siegeNormalises = $normalizer->normalize($siege, null, [
            'groups'=>'siege'
        ]);
        $siegeJson = json_encode($siegeNormalises);
        $response = new Response($siegeJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
