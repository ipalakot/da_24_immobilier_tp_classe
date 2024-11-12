<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Repository\AgenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class AgenceController extends AbstractController
{
    //affichage de a liste des Agences
    #[Route('/', name: 'app_agence')]
    public function index(AgenceRepository $agenceRepository): Response
    {
        return $this->render('agence/index.html.twig', [
            'controller_name' => 'AgenceController',
            'agences' => $agenceRepository->findAll(),
        ]);
    }

    // Ajouter une Agence dans la table Agence
    #[Route('/agences/nouveau', name: 'agence_nouveau')]
    public function ajoutAgence(Request $request, EntityManagerInterface $manager)
    {
        $agence = new Agence();
        $form = $this->createFormBuilder($agence)
            ->add('numeroAgence')
            ->add('adresse')
            ->getForm();
        $form->handleRequest($request); // Le Request
        if ($form->isSubMitted() && $form->isValid()) { // Soumission du Formulaire

            $manager->persist($agence); // Persistancede mon agence
            $manager->flush(); // Enregistrement de l'agence dans la BD
            return $this->redirectToRoute('agence_affichage', ['id' => $agence->getId()]); // Redirection vers l'agence
        }
        return $this->render('agence/nouveau.html.twig', [
            'formCreatAgence' => $form->createView(),
        ]);
    }

        // Modifier une Agence dans la table Agence
        #[Route('/agences/modif/{id}', name: 'agence_modif')]
        public function modifAgence(Agence $agence, Request $request, EntityManagerInterface $manager)
        {
            //$agence = new Agence();
            $form = $this->createFormBuilder($agence)
                ->add('numeroAgence')
                ->add('adresse')
                ->getForm();

            $form->handleRequest($request); // Le Request

            if ($form->isSubMitted() && $form->isValid()) { // Soumission du Formulaire
    
                $manager->persist($agence); // Persistancede mon agence
                $manager->flush(); // Enregistrement de l'agence dans la BD

                return $this->redirectToRoute('agence_affichage', ['id' => $agence->getId()]); // Redirection vers l'agence
            }
    
            return $this->render('agence/nouveau.html.twig', [
                'formCreatAgence' => $form->createView(),
            ]);
        }
                 
        //affichage d'une seule Agence dans la liste des Agences
         #[Route('/agences/{id}', name: 'agence_affichage')]
         public function affichage(Agence $agence): Response
         {
            return $this->render('agence/modif.html.twig', [
                'formModifAgence' => $form->createView()
                ]);
         }

}
