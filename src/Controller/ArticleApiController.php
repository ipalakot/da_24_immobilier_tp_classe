<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleApiController extends AbstractController
{
    #[Route('/article/api', name: 'app_article_api')]
    public function index(): Response
    {
        return $this->render('article_api/index.html.twig', [
            'controller_name' => 'ArticleApiController',
        ]);
    }
}
