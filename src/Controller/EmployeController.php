<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\Employe1Type;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/employe')]
final class EmployeController extends AbstractController
{
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
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{id}/modif', name: 'employe_edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Employe1Type::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
}
