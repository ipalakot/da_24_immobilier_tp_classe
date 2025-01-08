<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{

    #[Route('/index', name: 'app_index')]
    #[Route('/accueil')]
    #[Route('/home')]
    public function index(ArticleRepository $articleRepository, AgenceRepository $agenceRepository): Response
    {
        //$articles = $articleRepository->findUne();

        // Recherche de tous les articles en fonction de multiples conditions
        $articles = $articleRepository->findBy(
            ['une' => 1],
            ['titre' => 'ASC'], // le deuxième paramètre permet de définir l'ordre

        );

        return $this->render(
            'default/default.html.twig', [
                'articles' => $articles,
                'agences' => $agenceRepository->findAll(),
            ]
        );

    }

    public function apropos(): Response
    {
        return $this->render('default/apropos.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function contact(): Response
    {
        return $this->render('default/contact.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function connexion(): Response
    {
        return $this->render('default/contact.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
