<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiUserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(UserRepository $userRepository, NormalizerInterface $normalizer): Response
    {
        $user = $userRepository -> findAll();
        $userNormalises = $normalizer->normalize($user, null, [
            'groups'=>'user'
        ]);
        $userJson = json_encode($userNormalises);
        $response = new Response($userJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
