<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/api", name:"api_")]
class ApiEmployeController extends AbstractController
{
    #[Route('/employe', name: 'employe')]
    public function index(EmployeRepository $employeRepository, NormalizerInterface $normalizer): Response
    {
        $employe = $employeRepository -> findAll();
        $employeNormalises = $normalizer->normalize($employe, null, [
            'groups'=>'employe'
        ]);
        $employeJson = json_encode($employeNormalises);
        $response = new Response($employeJson, 200, [
            "content-type"=>"application/json"
        ]);
        return $response;
    }
}
