<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'utilisateurController',
            'utilisateurs' => $utilisateurRepository->findAll()
        ]);
    }


#[Route('utilisateur/nouveau', name:'app_utilisateur_nouveau')]
    public function ajoutUtilisateur(Request $request, EntityManagerInterface $manager) {
        $utilisateur = new Utilisateur();
        $form=$this->createFormBuilder($utilisateur)
        ->add('nom')
        ->add('prenoms')
        ->add('adresse')
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($utilisateur);
            $manager->flush();
        }
        return $this->render("utilisateur/nouveau.html.twig", [
        "formCreateUtilisateur"=>$form->createView()]);
    }

    #[Route('utilisateur/modif/{id}', name:'app_utilisateur_modif')]
    public function modifUtilisateur(Request $request, EntityManagerInterface $manager, utilisateur $utilisateur) {
        $form=$this->createFormBuilder($utilisateur)
        ->add('nom')
        ->add('prenoms')
        ->add('adresse')
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($utilisateur);
            $manager->flush();
        }
        return $this->render("utilisateur/modif.html.twig", [
        "formCreateUtilisateur"=>$form->createView()]);
    }

}
