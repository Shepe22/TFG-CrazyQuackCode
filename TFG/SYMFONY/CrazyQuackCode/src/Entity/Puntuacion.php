<?php

namespace App\Entity;

use App\Repository\PuntuacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PuntuacionRepository::class)]
class Puntuacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tiempoTotalEscritura = null;

    #[ORM\Column]
    private ?int $palabrasMinuto = null;

    #[ORM\Column]
    private ?int $errores = null;

    #[ORM\ManyToOne(targetEntity: Usuario::class, inversedBy: 'puntuaciones')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Usuario $usuario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTiempoTotalEscritura(): ?int
    {
        return $this->tiempoTotalEscritura;
    }

    public function setTiempoTotalEscritura(int $tiempoTotalEscritura): static
    {
        $this->tiempoTotalEscritura = $tiempoTotalEscritura;
        return $this;
    }

    public function getPalabrasMinuto(): ?int
    {
        return $this->palabrasMinuto;
    }

    public function setPalabrasMinuto(int $palabrasMinuto): static
    {
        $this->palabrasMinuto = $palabrasMinuto;
        return $this;
    }

    public function getErrores(): ?int
    {
        return $this->errores;
    }

    public function setErrores(int $errores): static
    {
        $this->errores = $errores;
        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;
        return $this;
    }
}
