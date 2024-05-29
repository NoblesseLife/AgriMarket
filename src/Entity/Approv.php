<?php

namespace App\Entity;

use App\Repository\ApprovRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApprovRepository::class)]
class Approv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Produit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LivraisonFournisseur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?string
    {
        return $this->Produit;
    }

    public function setProduit(?string $Produit): static
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getLivraisonFournisseur(): ?string
    {
        return $this->LivraisonFournisseur;
    }

    public function setLivraisonFournisseur(?string $LivraisonFournisseur): static
    {
        $this->LivraisonFournisseur = $LivraisonFournisseur;

        return $this;
    }
}
