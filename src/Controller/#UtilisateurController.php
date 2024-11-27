<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/utilisateurs', name: 'utilisateurs_')]
class UtilisateurController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'utilisateurController',
            'utilisateurs' => $utilisateurRepository->findAll()
        ]);
    }

#[Route('/nouveau', name:'_nouveau')]
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

    #[Route('/modif/{id}', name:'_modification')]
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
