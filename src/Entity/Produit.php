<?php

namespace App\Entity;

use App\Entity\Categorie;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $NomPro = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DesPro = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $PrixPro = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $StockDispo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ImgPro = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Categorie $Categorie = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPro(): ?string
    {
        return $this->NomPro;
    }

    public function setNomPro(?string $NomPro): static
    {
        $this->NomPro = $NomPro;

        return $this;
    }

    public function getDesPro(): ?string
    {
        return $this->DesPro;
    }

    public function setDesPro(?string $DesPro): static
    {
        $this->DesPro = $DesPro;

        return $this;
    }

    public function getPrixPro(): ?string
    {
        return $this->PrixPro;
    }

    public function setPrixPro(?string $PrixPro): static
    {
        $this->PrixPro = $PrixPro;

        return $this;
    }

    public function getStockDispo(): ?string
    {
        return $this->StockDispo;
    }

    public function setStockDispo(?string $StockDispo): static
    {
        $this->StockDispo = $StockDispo;

        return $this;
    }

    public function getImgPro(): ?string
    {
        return $this->ImgPro;
    }

    public function setImgPro(?string $ImgPro): static
    {
        $this->ImgPro = $ImgPro;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
    public function __toString()
    {
        return $this->getNomPro();
    }
}
