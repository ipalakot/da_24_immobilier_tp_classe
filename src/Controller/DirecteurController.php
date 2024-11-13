<?php

namespace App\Controller;
use App\Repository\DirecteurRepository;
use App\Entity\Directeur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DirecteurController extends AbstractController
{
    #[Route('/directeur', name: 'app_directeur')]
    public function index(directeurRepository $directeurRepository): Response
    {
        return $this->render('directeur/index.html.twig', [
            'controller_name' => 'DirecteurController',
            'directeurs' => $directeurRepository->findAll()
        ]);
    }



    #[Route('/directeur/nouveau', name: 'directeur_nouveau')]
    public function ajoutDirecteur(Request $request, EntityManagerInterface $manager)
    {
        $directeur = new Directeur();
        $form = $this->createFormBuilder($directeur)
        ->add('nom')
        ->add('prenom')
        ->add('revenus')
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubMitted() && $form->isValid()) {
            $manager->persist($directeur);
            $manager->flush();
            return $this->redirectToRoute('directeur_affichage', ['id' => $directeur->getId()]);
        }
        return $this->render('directeur/nouveau.html.twig', 
        [
            'formCreatDirecteur' => $form->createView(),
        ]);
    }

    #[Route('/directeur/modif/{id}', name: 'directeur_modif')]
    public function modifDirecteur(Directeur $directeur, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createFormBuilder($directeur)
        ->add('nom')
        ->add('prenom')
        ->add('revenus')
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubMitted() && $form->isValid()) {
            $manager->persist($directeur);
            $manager->flush();
            return $this->redirectToRoute('directeur_affichage', ['id' => $directeur->getId()]);
        }
        return $this->render('directeur/modif.html.twig', 
        [
            'formCreatDirecteur' => $form->createView(),
        ]);
    }

    #[Route('/directeur/{id}', name: 'directeur_affichage')]
    public function affichage(directeur $directeur): Response
    {
        return $this->render('directeur/affichage.html.twig', [
            'controller_name' => 'DirecteurController',
            'directeur' => $directeur,
        ]);
    }

    
}
