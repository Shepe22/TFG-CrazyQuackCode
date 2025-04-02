<?php

namespace App\Controller;

use App\Repository\LenguajeProgramacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ApiLenguajeController extends AbstractController
{
    #[Route('/lenguaje/{lenguaje}', name: 'fragmento_aleatorio', methods: ['GET'])]
    public function obtenerFragmento(string $lenguaje, LenguajeProgramacionRepository $repo): JsonResponse
    {
        $fragmentos = $repo->findBy(['nombreLenguaje' => $lenguaje ]);

        if (count($fragmentos) === 0) {
            return $this->json(['error' => 'No hay fragmentos disponibles'], 404);
        }

        $fragmento = $fragmentos[array_rand($fragmentos)];

        return $this->json([
            'id' => $fragmento->getId(),
            'nombreLenguaje' => $fragmento->getnombreLenguaje(),
            'fragmentoCodigo' => $fragmento->getfragmentoCodigo(),
            'explicacion' => $fragmento->getExplicacion(),

        ]);
    }
}

