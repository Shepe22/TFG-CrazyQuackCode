<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
final class ApiAuthController extends AbstractController
{
    #[Route('/registro', name: 'api_registro', methods: ['POST'])]
    public function registro(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['nombre'], $data['email'], $data['contrasenia'])) {
            return new JsonResponse(['error' => 'Faltan datos'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $usuario = new Usuario();
        $usuario->setNombre($data['nombre']);
        $usuario->setEmail($data['email']);
        $usuario->setContrasenia(password_hash($data['contrasenia'], PASSWORD_BCRYPT));

        $entityManager->persist($usuario);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Usuario registrado correctamente'], JsonResponse::HTTP_CREATED);
    }

    #[Route('/acceso', name: 'api_acceso', methods: ['POST'])]
    public function acceso(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $usuario = $entityManager->getRepository(Usuario::class)->findOneBy(['email' => $data['email']]);

        if (!$usuario || !password_verify($data['contrasenia'], $usuario->getContrasenia())) {
            return new JsonResponse(['error' => 'Credenciales incorrectas'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse([
            'message' => 'Acceso correcto',
            'usuario' => [
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre()
            ]
        ]);
    }
}
