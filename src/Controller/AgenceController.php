<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Form\AgenceType;
use App\Repository\AgenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/agence')]
final class AgenceController extends AbstractController
{
    #[Route(name: 'agence_index', methods: ['GET'])]
    public function index(AgenceRepository $agenceRepository): Response
    {
        return $this->render('agence/index.html.twig', [
            'agences' => $agenceRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'agence_nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $agence = new Agence();
        $form = $this->createForm(AgenceType::class, $agence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($agence);
            $entityManager->flush();

            return $this->redirectToRoute('agence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('agence/new.html.twig', [
            'agence' => $agence,
            'formAgency' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'agence_affichage', methods: ['GET'])]
    public function show(Agence $agence): Response
    {
        return $this->render('agence/show.html.twig', [
            'agence' => $agence,
        ]);
    }

    #[Route('/{id}/edit', name: 'agence_edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Agence $agence, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AgenceType::class, $agence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('agence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('agence/edit.html.twig', [
            'agence' => $agence,
            'formAgency' => $form,
        ]);
    }

    #[Route('/{id}', name: 'agence_suppression', methods: ['POST'])]
    public function delete(Request $request, Agence $agence, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $agence->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($agence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agence_index', [], Response::HTTP_SEE_OTHER);
    }

}