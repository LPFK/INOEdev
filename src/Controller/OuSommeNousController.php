<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuSommeNousController extends AbstractController
{
    #[Route('/position', name: 'ou_somme_nous')]
    public function index(): Response
    {
        return $this->render('ou_somme_nous/index.html.twig', [
            'controller_name' => 'OuSommeNousController',
        ]);
    }
}
