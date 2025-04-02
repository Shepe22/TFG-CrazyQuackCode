<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $contrasenia = null;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: Puntuacion::class, cascade: ['persist', 'remove'])]
    private Collection $puntuaciones;

    public function __construct()
    {
        $this->puntuaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getContrasenia(): ?string
    {
        return $this->contrasenia;
    }

    public function setContrasenia(string $contrasenia): static
    {
        $this->contrasenia = $contrasenia;
        return $this;
    }

    /**
     * @return Collection<int, Puntuacion>
     */
    public function getPuntuaciones(): Collection
    {
        return $this->puntuaciones;
    }

    public function addPuntuacion(Puntuacion $puntuacion): static
    {
        if (!$this->puntuaciones->contains($puntuacion)) {
            $this->puntuaciones->add($puntuacion);
            $puntuacion->setUsuario($this);
        }

        return $this;
    }

    public function removePuntuacion(Puntuacion $puntuacion): static
    {
        if ($this->puntuaciones->removeElement($puntuacion)) {
            // Set the owning side to null (unless already changed)
            if ($puntuacion->getUsuario() === $this) {
                $puntuacion->setUsuario(null);
            }
        }

        return $this;
    }
}
