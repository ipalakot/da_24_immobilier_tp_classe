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
    #[Route("/articles", name:"article_list2", methods:('GET'))]
    public function liste(ArticleRepository $articleRepo): Response
    {
        #_1 Recupération des Articles
            // On récupère la liste des articles et on les affiche comme nous savons dejà faire
             $articles = $articleRepo -> findAll();
            //dd($articles);    


        # Transformer la Collection en tableau
        # Normalizer
        #_2 Json_Encode
        // Affichage en JSon de mes articles
        //J'utilise la function Json_encode pour lister mes artcles
        //  Je vais utiliser l'encodeur JSON1 l'affiche du Tableau
                 $articleJson = json_encode($articles );          
             dd($articleJson);     

        #_3 Normalization
        // Consiste à ustiliser la function NORMALIZER
        // Elle est un plus puissante que le Json_Encode
                //$articles = $articleRepo -> findAll();
                // $articlesNormalises = $normalizer -> normalize($articles);
                // dd($articlesNormalises); 

                
    }
}
