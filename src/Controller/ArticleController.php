<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Client;

use App\Repository\ArticleRepository;
use App\Form\ArticleType;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/articles', name: '')]
class ArticleController extends AbstractController
{
       
    
    #[Route('/', name: 'article_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles'=> $articleRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'article_nouveau')]
    public function ajoutArticle(Request $request, EntityManagerInterface $manager)
    {
        $article = new Article();
        //$form = $this->createFormBuilder($article)
        $form = $this->createForm(ArticleType::class, $article);

       /* // Formulaire à l'interieur du controleur
            ->add('titre')
            ->add('adresse')
            ->add('images')
            ->add('type')
            ->add('surface')
            ->add('prix')
            ->add('owner')
            ->add('owner')
            ->add('gestionnaire')
            ->add('agence')
            ->add('description')

            ->getForm(); */

        $form->handleRequest($request); // Le Request

        //var_dump($article);

        if ($form->isSubMitted() && $form->isValid()) { // Soumission du Formulaire
            $manager->persist($article); // Persistancede mon article
            $manager->flush(); // Enregistrement de l'article dans la BD

            return $this->redirectToRoute('article_affichage', ['id' => $article->getId()]); // Redirection vers l'article
        }

        return $this->render('article/nouveau.html.twig', [
            'formCreatArticle' => $form->createView(),
        ]);
    }
    /*
    #[Route('/{id}', name: 'article_affichage', methods: ['GET'])]
    public function affichage(Article $article): Response
    {
        return $this->render('article/affichage.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=> $article,
        ]);
    } */

    #[Route('/{id}', name: 'article_affichage', methods: ['GET'])]
    public function affichage($id, ArticleRepository $articlerepo ): Response
    {
        $articles = $articlerepo->find($id);
        return $this->render('article/affichage.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=> $articles,
        ]);
    }

    
    /**
     * Affiche en details d'un Bien locatif
     * @param $id
     * @param LocationRepository $immorepo
     * @Route("/articles2/{id}", name="location.affich")
    */
   /* public function affichage2($id, ArticleRepository $articlerepo ) 
    {
        // Appel à Doctrine & au repository
        // $repo = $this->getDoctrine()->getRepository(Location::class);
        //Recherche de l'article avec son identifaint
        $articles = $articlerepo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('article/affichage.html.twig', [
            'controller_name' => 'articleController',
            'articles' => $articles
        ]);
    }*/


    #[Route('/modif/{id}', name: 'article_modif')]
    public function modifArticle(Request $request, Article $article, EntityManagerInterface $manager)
    {
        $form = $this->createFormBuilder($article)
            ->add('titre')
            ->add('adresse')
            ->add('images')
            ->add('type')
            ->add('surface')
            ->add('prix')
            ->add('owner')
            ->add('owner')
            ->add('gestionnaire')
            ->add('agence')
            ->add('description')
            ->getForm();

        $form->handleRequest($request); 

        if ($form->isSubMitted() && $form->isValid()) { 
            $manager->persist($article); 
            $manager->flush(); 

            return $this->redirectToRoute('article_affichage', ['id' => $article->getId()]);
        }

        return $this->render('article/edit.html.twig', [
            'formCreatArticle' => $form->createView(),
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
