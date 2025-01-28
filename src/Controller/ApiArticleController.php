<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
final class ApiArticleController extends AbstractController
{
    #[Route('/article', name: 'article')]
    public function index(ArticleRepository $articleRepo, NormalizerInterface $normalizer): Response
    {
        $articles = $articleRepo -> findAll();
        $articlesNormalises = $normalizer->normalize($articles, null, [
            'groups'=>'list_articles'
        ]);
        $articlesJson = json_encode($articlesNormalises);
        $response = new Response($articlesJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
