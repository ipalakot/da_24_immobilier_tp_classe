<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/articles', name: '')]
class ArticleController extends AbstractController
{

    #[Route('/', name: 'article_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'article_nouveau')]
    public function ajoutArticle(Request $request, EntityManagerInterface $manager)
    {
        $article = new Article();
        //$form = $this->createFormBuilder($article)
        $form = $this->createForm(ArticleType::class, $article);

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

    #[Route('/{id}', name: 'article_affichage', methods: ['GET'])]
    public function affichage($id, ArticleRepository $articlerepo): Response
    {
        $articles = $articlerepo->find($id); //find($id)
        return $this->render('article/affichage.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }

    #[Route('/articles/liste', name: 'article_affichage_liste', methods: ['GET'])]
    public function affichageListe(ArticleRepository $artrepo)
    {
        $articles = $artrepo->findOneBy(array('titre' => 'John Doe')); //findOneBy()
        return $this->render(
            'article/affichage.html.twig', [
                'article' => $articles,
            ]
        );
    }

    #[Route('/articles/liste2', name: 'article_affichage_liste', methods: ['GET'])]
    public function affichageListe2(ArticleRepository $artrepo)
    {
        $articles = $artrepo->findBy(
            ['titre' => 'John Doe', 'id' => 'ASC']); //findBy()

        return $this->render(
            'article/affichage.html.twig', [
                'article' => $articles,
            ]
        );

    }

    #[Route('/articles/listetitre', name: 'article_affichage_liste', methods: ['GET'])]
    public function findByTitre(ArticleRepository $artrepo)
    {
        $articles = $artrepo->findByTitre(array('maison à louer'));
        return $this->render(
            'article/affichage.html.twig', [
                'articles' => $articles,
            ]
        );
    }

    #[Route('/articles/liste1titre', name: 'article_affichage_liste', methods: ['GET'])]
    public function findOneByTitre(ArticleRepository $artrepo)
    {
        $articles = $artrepo->findByTitre(array('maison à louer'));
        return $this->render(
            'article/affichage.html.twig', [
                'articles' => $articles,
            ]
        );
    }

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
            ->add('employe')
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
        $contact = $request->attributes->get('contact');
        return new Response(" Vous êtes le Cont N° $contact");
        //die();
    }

     /**
     * Ici demarre mes Tries
     */

    #[Route('/trie/articletitre', name: 'trie_article_titre')]
    //Trie des Biens par rapport au titre
    public function trieArticleTitre(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->trieArticleTitre();
        return $this->render(
            'article/index.html.twig', [
            // passage du contenu de $location
            'articles' => $articles,
            ]
        );
    } 

    #[Route('/trie/articleadresse', name: 'trie_article_adresse')]
    //Trie des Biens par les adresses
    public function trieArticleAdresse(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->trieArticleAdresse();
        return $this->render(
            'article/index.html.twig', [
            // passage du contenu de $location
            'articles' => $articles,
            ]
        );
    } 


    /** 
     *  @return Articles [] Liste par Type
     */
    #[Route('/trie/articletype', name: 'trie_article_type')]
    //Trie des Biens par les adresses
    public function trieArticleType(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->trieArticleType();
        return $this->render(
            'article/index.html.twig', [
            // passage du contenu de $location
            'articles' => $articles,
            ]
        );
    } 


//trier les articles par Surface
#[Route('/trie/surface', name: 'article.trier.surface')]
public function indexArticlesTrierSurface(ArticleRepository $articleRepository, Request $request)
{
    $articles = $articleRepository->findTrieSurface_AZ(); 
    // Appel de la page pour affichage
    return $this->render(
        'article/index.html.twig', [
        // passage du contenu de $location
        'articles' => $articles,
        ]
    );
} 


/**
 * trier par prix croissant 
 */
 #[Route('/trie/prix', name: 'article.trier.prix')]
 public function indexArticlesTrierPrix(ArticleRepository $articleRepository, Request $request)
 {
     $articles = $articleRepository->findAscPrice(); 
     // Appel de la page pour affichage
     return $this->render(
         'article/index.html.twig', [
         // passage du contenu de $location
         'articles' => $articles,
         ]
     );
 } 

/**
 * 
*/
 //trier les articles par categories Location Maiosn
 #[Route('/trie/categorie-maison-loc', name: 'article.trier.location.maison')]
 public function indexArticlesCategorieLocMaisont(ArticleRepository $articleRepository, Request $request)
 {
     $articles = $articleRepository->findCategorieLocApprt(); 
     // Appel de la page pour affichage
     return $this->render(
         'article/index.html.twig', [
         // passage du contenu de $location
         'articles' => $articles,
         ]
     );
 }








    //#[Route('/location', name: 'location')]
     public function location(): Response
     {
         return $this->render('article/page.html.twig', [
             'controller_name' => 'ArticleController',
             'title' => 'Location de Biens',
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
