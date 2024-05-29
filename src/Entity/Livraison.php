<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $DateLiv = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLiv(): ?string
    {
        return $this->DateLiv;
    }

    public function setDateLiv(?string $DateLiv): static
    {
        $this->DateLiv = $DateLiv;

        return $this;
    }
}
