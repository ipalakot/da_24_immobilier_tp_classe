<?php

namespace App\Controller;

use App\Entity\CategorieClt;
use App\Form\CategorieCltType;
use App\Repository\CategorieCltRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorie/clt')]
final class CategorieCltController extends AbstractController
{
    #[Route(name: 'app_categorie_clt_index', methods: ['GET'])]
    public function index(CategorieCltRepository $categorieCltRepository): Response
    {
        return $this->render('categorie_clt/index.html.twig', [
            'categorie_clts' => $categorieCltRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_clt_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorieClt = new CategorieClt();
        $form = $this->createForm(CategorieCltType::class, $categorieClt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorieClt);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_clt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_clt/new.html.twig', [
            'categorie_clt' => $categorieClt,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_clt_show', methods: ['GET'])]
    public function show(CategorieClt $categorieClt): Response
    {
        return $this->render('categorie_clt/show.html.twig', [
            'categorie_clt' => $categorieClt,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_clt_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieClt $categorieClt, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieCltType::class, $categorieClt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_clt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_clt/edit.html.twig', [
            'categorie_clt' => $categorieClt,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_clt_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieClt $categorieClt, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieClt->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($categorieClt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorie_clt_index', [], Response::HTTP_SEE_OTHER);
    }
}
