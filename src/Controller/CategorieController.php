<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Entity\Categorie;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'categories'=> $categorieRepository->findAll()
        ]);
    }



    #[Route('/categorie/{id}', name: 'categorie_affichage')]
    public function affichage(Categorie $categorie): Response
    {
        return $this->render('categorie/affichage.html.twig', [
         'categorie'=> $categorie,
        ]);
    }





}
