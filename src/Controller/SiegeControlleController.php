<?php

namespace App\Controller;

use App\Repository\siegeRepository;
use App\Entity\Siege;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiegeControlleController extends AbstractController
{
    #[Route('/siege', name: 'app_siege_controlle')]
    public function index(): Response
    {
        return $this->render('siege/index.html.twig', [
            'controller_name' => 'SiegeControlleController',
        ]);
    }

    #[Route('/siege/nouveau', name: 'app_siege_nouveau')]
    public function ajoutSiege(Request $request, EntityManagerInterface $manager)
    {
        $siege= new Siege();
        $form = $this->createFormBuilder($siege)
        ->add('nom')
        ->add('capital')
        ->add('adresse')
        ->getform();

        $form->handleRequest($request);
        if ($form->isSubMitted() && $form->isValid()) {
            $manager->persist($siege);
            $manager->flush();
            return $this->redirectToRoute('siege_affichage', ['id' => $siege->getId()]);
            }
        
        return $this->render('siege/nouveau.html.twig', [
            'formCreatSiege' => $form->createView(),
        ]);

    }

    #[Route('/siege/modif/{id}', name: 'app_siege_modif')]
    public function modifSiege(Siege $siege, Request $request, EntityManagerInterface $manager)
    {
        $siege= new Siege();
        $form = $this->createFormBuilder($siege)
        ->add('nom')
        ->add('capital')
        ->add('adresse')
        ->getform();

        $form->handleRequest($request);
        if ($form->isSubMitted() && $form->isValid()) {
            $manager->persist($siege);
            $manager->flush();
            return $this->redirectToRoute('siege_affichage', ['id' => $siege->getId()]);
            }
        
        return $this->render('siege/modif.html.twig', [
            'formCreatSiege' => $form->createView(),
        ]);

    }
}
