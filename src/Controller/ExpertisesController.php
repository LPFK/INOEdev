<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpertisesController extends AbstractController
{
    #[Route('/expertises', name: 'expertises')]
    public function index(): Response
    {
        return $this->render('expertises/index.html.twig', [
            'controller_name' => 'ExpertisesController',
        ]);
    }
}
