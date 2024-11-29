<?php

namespace App\Controller;

use App\Entity\Siege;
use App\Form\SiegeType;
use App\Repository\SiegeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/siege')]
final class SiegeController extends AbstractController
{
    #[Route(name: 'siege_index', methods: ['GET'])]
    public function index(SiegeRepository $siegeRepository): Response
    {
        return $this->render('siege/index.html.twig', [
            'sieges' => $siegeRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'siege_nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $siege = new Siege();
        $form = $this->createForm(SiegeType::class, $siege);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($siege);
            $entityManager->flush();

            return $this->redirectToRoute('siege_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('siege/new.html.twig', [
            'siege' => $siege,
            'siegeForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'siege_affichage', methods: ['GET'])]
    public function show(Siege $siege): Response
    {
        return $this->render('siege/show.html.twig', [
            'siege' => $siege,
        ]);
    }

    #[Route('/{id}/edit', name: 'siege_edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Siege $siege, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SiegeType::class, $siege);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('siege_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('siege/edit.html.twig', [
            'siege' => $siege,
            'siegeForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'siege_suppression', methods: ['POST'])]
    public function delete(Request $request, Siege $siege, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$siege->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($siege);
            $entityManager->flush();
        }

        return $this->redirectToRoute('siege_index', [], Response::HTTP_SEE_OTHER);
    }
}
