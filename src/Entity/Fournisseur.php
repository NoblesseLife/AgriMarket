<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $NomFrs = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $AdressFrs = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $TelFrs = null;

    /**
     * @var Collection<int, LivraisonFournisseur>
     */
    #[ORM\OneToMany(targetEntity: LivraisonFournisseur::class, mappedBy: 'fournisseur')]
    private Collection $livfrs;

    public function __construct()
    {
        $this->livfrs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFrs(): ?string
    {
        return $this->NomFrs;
    }

    public function setNomFrs(?string $NomFrs): static
    {
        $this->NomFrs = $NomFrs;

        return $this;
    }

    public function getAdressFrs(): ?string
    {
        return $this->AdressFrs;
    }

    public function setAdressFrs(?string $AdressFrs): static
    {
        $this->AdressFrs = $AdressFrs;

        return $this;
    }

    public function getTelFrs(): ?string
    {
        return $this->TelFrs;
    }

    public function setTelFrs(?string $TelFrs): static
    {
        $this->TelFrs = $TelFrs;

        return $this;
    }

    /**
     * @return Collection<int, LivraisonFournisseur>
     */
    public function getLivfrs(): Collection
    {
        return $this->livfrs;
    }

    public function addLivfr(LivraisonFournisseur $livfr): static
    {
        if (!$this->livfrs->contains($livfr)) {
            $this->livfrs->add($livfr);
            $livfr->setFournisseur($this);
        }

        return $this;
    }

    public function removeLivfr(LivraisonFournisseur $livfr): static
    {
        if ($this->livfrs->removeElement($livfr)) {
            // set the owning side to null (unless already changed)
            if ($livfr->getFournisseur() === $this) {
                $livfr->setFournisseur(null);
            }
        }

        return $this;
    }
}
