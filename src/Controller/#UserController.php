<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    public function contact(Request $request)
    {
        //dd('$contact');
        $contact = $request ->attributes->get('contact'); 
        return new Response(" Vous êtes le Cont N° $contact");
        //die(); 
    }

    
    #[Route('/exo2', name:'view_exo2')]

    public function exo2(): Response
    {
        $stagiaire = ['Bilel','Marie Laure','Chakhib','Aristide','Julien'];
        return $this->render('user/listeda2.html.twig', [
            'controller_name' => 'ViewController',
            'tableau'=> $stagiaire, 
        ]);
    }



}
