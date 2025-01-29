<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Polyfill\Intl\Normalizer\Normalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

#[Route("/api", name:"api_")]
 class ApiController extends AbstractController
{
    #[Route("/listes", name:"article_list2", methods:('GET'))]
    public function liste(ArticleRepository $articleRepo, NormalizerInterface $normalizer): Response
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