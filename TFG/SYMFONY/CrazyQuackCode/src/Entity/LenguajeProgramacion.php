<?php

namespace App\Entity;

use App\Repository\LenguajeProgramacionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LenguajeProgramacionRepository::class)]
class LenguajeProgramacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreLenguaje = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fragmentoCodigo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $explicacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreLenguaje(): ?string
    {
        return $this->nombreLenguaje;
    }

    public function setNombreLenguaje(string $nombreLenguaje): static
    {
        $this->nombreLenguaje = $nombreLenguaje;
        return $this;
    }

    public function getFragmentoCodigo(): ?string
    {
        return $this->fragmentoCodigo;
    }

    public function setFragmentoCodigo(string $fragmentoCodigo): static
    {
        $this->fragmentoCodigo = $fragmentoCodigo;
        return $this;
    }

    public function getExplicacion(): ?string
    {
        return $this->explicacion;
    }

    public function setExplicacion(string $explicacion): static
    {
        $this->explicacion = $explicacion;
        return $this;
    }
}
