<?php

namespace App\Controller;

use App\Entity\Directeur;
use App\Form\DirecteurType;
use App\Repository\DirecteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/directeur')]
final class DirecteurController extends AbstractController
{
    #[Route(name: 'directeur_index', methods: ['GET'])]
    public function index(DirecteurRepository $directeurRepository): Response
    {
        return $this->render('directeur/index.html.twig', [
            'directeurs' => $directeurRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'directeur_nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $directeur = new Directeur();
        $form = $this->createForm(DirecteurType::class, $directeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($directeur);
            $entityManager->flush();

            return $this->redirectToRoute('directeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('directeur/new.html.twig', [
            'directeur' => $directeur,
            'directeurForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'directeur_affichage', methods: ['GET'])]
    public function show(Directeur $directeur): Response
    {
        return $this->render('directeur/show.html.twig', [
            'directeur' => $directeur,
        ]);
    }

    #[Route('/{id}/edition', name: 'directeur_edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Directeur $directeur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DirecteurType::class, $directeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('directeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('directeur/edit.html.twig', [
            'directeur' => $directeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'directeur_suppression', methods: ['POST'])]
    public function delete(Request $request, Directeur $directeur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$directeur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($directeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('directeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
