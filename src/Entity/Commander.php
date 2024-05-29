<?php

namespace App\Entity;

use App\Repository\CommanderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommanderRepository::class)]
class Commander
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $Produit = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $Commande = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $QteCom = null;

    /**
     * @var Collection<int, livraison>
     */
    #[ORM\ManyToMany(targetEntity: livraison::class)]
    private Collection $livraison;

    public function __construct()
    {
        $this->livraison = new ArrayCollection();
    }

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

    public function getCommande(): ?string
    {
        return $this->Commande;
    }

    public function setCommande(?string $Commande): static
    {
        $this->Commande = $Commande;

        return $this;
    }

    public function getQteCom(): ?string
    {
        return $this->QteCom;
    }

    public function setQteCom(?string $QteCom): static
    {
        $this->QteCom = $QteCom;

        return $this;
    }

    /**
     * @return Collection<int, livraison>
     */
    public function getLivraison(): Collection
    {
        return $this->livraison;
    }

    public function addLivraison(livraison $livraison): static
    {
        if (!$this->livraison->contains($livraison)) {
            $this->livraison->add($livraison);
        }

        return $this;
    }

    public function removeLivraison(livraison $livraison): static
    {
        $this->livraison->removeElement($livraison);

        return $this;
    }
}
