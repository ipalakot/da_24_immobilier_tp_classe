<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Employe;
use App\Form\Employe1Type;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
#[Route('/admin/employe')]
final class EmployeController extends AbstractController
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    
    #[Route(name: 'employe_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        return $this->render('employe/index.html.twig', [
            'employes' => $employeRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'employe_nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $employe = new Employe();
        $form = $this->createForm(Employe1Type::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $employe->setRoles(['ROLE_ADMIN']);
            $employe->setPassword($this->passwordHasher->hashPassword($employe, $employe->getPassword()));


            $entityManager->persist($employe);
            $entityManager->flush();

            return $this->redirectToRoute('employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employe/new.html.twig', [
            'employe' => $employe,
            'formEmploy' => $form,
        ]);
    }

    #[Route('/{id}', name: 'employe_affichage', methods: ['GET'])]
    public function show(Employe $employe, Article $articles): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
            'articles' => $articles,
        ]);
    }

    #[Route('/{id}/modif', name: 'employe_edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Employe1Type::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $employe->setRoles(['ROLE_ADMIN']);
            $employe->setPassword($this->passwordHasher->hashPassword($employe, $employe->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employe/edit.html.twig', [
            'employe' => $employe,
            'formEmploy' => $form,
        ]);
    }

    #[Route('/{id}', name: 'employe_suppression', methods: ['POST'])]
    public function delete(Request $request, Employe $employe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $employe->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($employe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employe_index', [], Response::HTTP_SEE_OTHER);
    }

    //Lister les gestionnaire par ordre ASC en fonction des agences
    #[Route('/trie/Agence', name: 'gestionnaire.agence.ASC')]
    public function indexEmploye(EmployeRepository $employeRepository, Request $request)
    {
        $employes = $employeRepository->findTrieArtcles_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'employe/index.html.twig', [
                // passage du contenu de $location
                'employes' => $employes,
            ]
        );
    }

    //trier les Employés par titre
    #[Route('/trie/noms', name: 'employe.trier.titre.AZ')]
    public function indexEmployesTrieNom(EmployeRepository $employeRepository, Request $request)
    {
        $employes = $employeRepository->findTrieEmployeNoms_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'employe/index.html.twig', [
                // passage du contenu de $location
                'employes' => $employes,
            ]
        );
    }

    //trier les Employés par titre
    #[Route('/trie/prenoms', name: 'employe.trier.prenoms.AZ')]
    public function indexEmployesTriePrenom(EmployeRepository $employeRepository, Request $request)
    {
        $employes = $employeRepository->findTrieEmployePrenoms_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'employe/index.html.twig', [
                // passage du contenu de $location
                'employes' => $employes,
            ]
        );
    }

    //trier les Employes par ordre croissant par Agence
    #[Route('/trie/agence', name: 'employe.categorie.agence.ASC')]
    public function indexAgence(EmployeRepository $employeRepository, Request $request)
    {
        $articles = $employeRepository->findEmplAgenceASC();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig', [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }
}