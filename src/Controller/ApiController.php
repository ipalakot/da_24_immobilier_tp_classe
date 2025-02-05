<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\ArticleRepository;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Polyfill\Intl\Normalizer\Normalizer;
//use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]   
 class ApiController extends AbstractController
{
    #[Route("/listes", name:"article_list2", methods:('GET'))]
    public function liste(ArticleRepository $articleRepo, NormalizerInterface $normalizer, SerializerInterface $serializer): Response
    {
        
         #_1 Recupération des Articles
            // On récupère la liste des articles et on les affiche comme nous savons dejà faire
            // $articles = $articleRepo -> findAll();
            // dd($articles);    

        # 2 Json_Encode
                /*$articles = $articleRepo -> findAll();
                $articlesJson = json_encode($articles);
                dd($articlesJson);   */ 

        #_3 Normalization
            // Consiste à ustiliser la function NORMALIZER
            // Elle est un plus puissante que le Json_Encode
           /*  $articles = $articleRepo -> findAll();
             $articlesNormalises = $normalizer -> normalize($articles);
            dd($articlesNormalises); */

        #_4 Normalization en taggant les Proprietés
            /* $articles = $articleRepo -> findAll();
             $articlesNormalises = $normalizer -> normalize($articles, null, [
                'groups'=>'list_articles'
             ]);
            dd($articlesNormalises);
            */            
        # 5 Encode Article avec Json_Encode
           /* $articles = $articleRepo -> findAll();
            $articlesNormalises = $normalizer -> normalize($articles, null, [
                'groups'=>'list_articles'
             ]);
             $json = json_encode( $articlesNormalises);
            dd($articlesJson);  */

        # 6 ESerialization
        $articles = $articleRepo->findAll();
        $articlesJson = $serializer->serialize($articles,'json', ['groups' => 'list_articles']);
       
    }  
    
   
}