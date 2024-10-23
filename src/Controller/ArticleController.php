<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//#[Route('/article', name: '')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    
    public function contact(Request $request)
    {
        //dd('$contact');
        $contact = $request ->attributes->get('contact'); 
        return new Response(" Vous êtes le Cont N° $contact");
        //die(); 
    }

    //#[Route('/location', name: 'location')]
    public function location(): Response
    {
        return $this->render('article/page.html.twig', [
            'controller_name' => 'ArticleController',
            'title'=>'Location de Biens'
        ]);
    }

    #[Route('/terrain', name: 'locationterrain')]
    public function location_terrain(): Response
    {
        return $this->render('article/page.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/location-maison', name: 'locationmaison')]
    public function location_maison(): Response
    {
        return $this->render('article/page.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/location-mappart', name: 'locationapprt')]
    public function location_appart(): Response
    {
        return $this->render('article/page.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    //#[Route('/vente', name: 'vente')]
    public function vente(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/vente-terrainte', name: 'vente_terrain')]
    public function vente_terrain(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/vente-maison', name: 'vente_maison')]
    public function vente_maison(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/vente-appart', name: 'vente_appart')]
    public function vente_appart(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
