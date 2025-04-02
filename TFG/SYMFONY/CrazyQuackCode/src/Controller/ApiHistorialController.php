<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiHistorialController extends AbstractController
{
    #[Route('/api/historial', name: 'app_api_historial')]
    public function index(): Response
    {
        return $this->render('api_historial/index.html.twig', [
            'controller_name' => 'ApiHistorialController',
        ]);
    }
}
