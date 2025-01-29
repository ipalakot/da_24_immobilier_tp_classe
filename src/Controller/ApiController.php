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
        #_1 Recupération des Articles
              // On récupère la liste des articles et on les affiche comme nous savons dejà faire
            // $articles = $articleRepo -> findAll();
             // dd($articles);    
        
        #_2 Json_Encode
                    // Affichage en JSon de mes articles
                    //J'utilise la function Json_encode pour lister mes artcles
                    //  Je vais utiliser l'encodeur JSON1 l'affiche du Tableau
                    // Proprieété privée
                    // Changer l'état, je vais voir le changement
            /* $articleJson = json_encode(  
                    /*   [
                           "titre"=> "string",
                           "categorie_id" => "",
                           "auteur_id"=> "",
                           "titre"=> "",
                           "resume" => " ",
                           "contenu" => " ",
                           "created_at"=> " ",
                           "prix"=> " ",
                           "disponibilite"=> " ",
                           "localite"=> "",
                           "une"=> "",
                           "resume"=> "string"
                       ]);*/
                //$articleJson = json_encode($articles );          
                // dd($articleJson);   

        #_3 Normalization
                // Consiste à ustiliser la function NORMALIZER
                // Elle est un plus puissante que le Json_Encode
            /* $articles = $articleRepo -> findAll();
                $articlesNormalises = $normalizer -> normalize($articles);
                dd($articlesNormalises); */

        #_4 Encode Article avec Json_Encode
            //$articles = $articleRepo -> findAll();
            /*$articlesNormalises = $normalizer->normalize($articles, null, [
                    'groups'=>'list_articles'
                ]);
                $json = json_encode($articlesNormalises);
                dd($json);*/ 
        
                 
        #_6 Utilisattion de reponse HTTP
        // creer une nouvelle Response
        //Passer $articlesJson
        // Utiliser 1 Content-Type pour signifier que l'application va s'afficher en Json
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