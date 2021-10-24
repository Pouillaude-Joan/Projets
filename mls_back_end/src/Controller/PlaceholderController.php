<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceholderController extends AbstractController
{
    #[Route('/placeholder', name: 'placeholder')]
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('placeholder/index.html.twig', [
            'controller_name' => 'PlaceholderController',
        ]);
    }
}
