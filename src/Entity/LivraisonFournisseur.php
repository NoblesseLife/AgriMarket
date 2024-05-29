<?php

namespace App\Entity;

use App\Repository\LivraisonFournisseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonFournisseurRepository::class)]
class LivraisonFournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $DateLivFrs = null;

    #[ORM\ManyToOne(inversedBy: 'livfrs')]
    private ?Fournisseur $fournisseur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivFrs(): ?string
    {
        return $this->DateLivFrs;
    }

    public function setDateLivFrs(?string $DateLivFrs): static
    {
        $this->DateLivFrs = $DateLivFrs;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
}
