<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $StatutCom = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $AdressLiv = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $DateCom = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?user $user = null;

    /**
     * @var Collection<int, Payement>
     */
    #[ORM\OneToMany(targetEntity: Payement::class, mappedBy: 'commande')]
    private Collection $payements;

    public function __construct()
    {
        $this->payements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutCom(): ?string
    {
        return $this->StatutCom;
    }

    public function setStatutCom(?string $StatutCom): static
    {
        $this->StatutCom = $StatutCom;

        return $this;
    }

    public function getAdressLiv(): ?string
    {
        return $this->AdressLiv;
    }

    public function setAdressLiv(?string $AdressLiv): static
    {
        $this->AdressLiv = $AdressLiv;

        return $this;
    }

    public function getDateCom(): ?string
    {
        return $this->DateCom;
    }

    public function setDateCom(?string $DateCom): static
    {
        $this->DateCom = $DateCom;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Payement>
     */
    public function getPayements(): Collection
    {
        return $this->payements;
    }

    public function addPayement(Payement $payement): static
    {
        if (!$this->payements->contains($payement)) {
            $this->payements->add($payement);
            $payement->setCommande($this);
        }

        return $this;
    }

    public function removePayement(Payement $payement): static
    {
        if ($this->payements->removeElement($payement)) {
            // set the owning side to null (unless already changed)
            if ($payement->getCommande() === $this) {
                $payement->setCommande(null);
            }
        }

        return $this;
    }
}
