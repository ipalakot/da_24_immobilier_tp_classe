<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    //#[Route('/location', name: 'articles_location')]
    public function location(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/location-terrainte', name: 'artlocation_terrain')]
        public function location_terrain(): Response
        {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
            ]);
        }
    
    #[Route('/location-maison', name: 'artlocation_maison')]
        public function location_maison(): Response
        {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
            ]);
        }

        
    #[Route('/location-mappart', name: 'artlocation_apprt')]
    public function location_appart(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }



    //#[Route('/vente', name: 'article_vente')]
    public function vente(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/vente-terrainte', name: 'artvente_terrain')]
        public function vente_terrain(): Response
        {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
            ]);
        }

    #[Route('/vente-maison', name: 'artvente_maison')]
        public function vente_maison(): Response
        {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
            ]);
        }
    
    #[Route('/vente-appart', name: 'artvente_appart')]
        public function vente_appart(): Response
        {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
            ]);
        }
}
