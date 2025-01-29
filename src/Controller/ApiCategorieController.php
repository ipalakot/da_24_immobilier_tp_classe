<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiCategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie')]
    public function index(CategorieRepository $categorieRepository, NormalizerInterface $normalizer): Response
    {
        $categorie = $categorieRepository -> findAll();
        $categorieNormalises = $normalizer->normalize($categorie, null, [
            'groups'=>'categorie'
        ]);
        $categorieJson = json_encode($categorieNormalises);
        $response = new Response($categorieJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
