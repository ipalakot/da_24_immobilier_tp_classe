<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
 class ApiController extends AbstractController
{
    #[Route("/articles", name:"article_list2", methods:('GET'))]
    public function liste(ArticleRepository $articleRepo): Response
    {
        #_1 Recupération des Articles
            // On récupère la liste des articles et on les affiche comme nous savons dejà faire
             $articles = $articleRepo -> findAll();
            dd($articles);    
                
    }
}
