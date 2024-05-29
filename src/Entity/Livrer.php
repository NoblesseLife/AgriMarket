<?php

namespace App\Entity;

use App\Repository\LivrerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivrerRepository::class)]
class Livrer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commander = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $livraison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommander(): ?string
    {
        return $this->commander;
    }

    public function setCommander(?string $commander): static
    {
        $this->commander = $commander;

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(?string $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }
}
