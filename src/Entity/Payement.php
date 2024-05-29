<?php

namespace App\Entity;

use App\Repository\PayementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementRepository::class)]
class Payement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $DatePayement = null;

    #[ORM\Column(length: 255)]
    private ?string $MontantTotal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MoyenPay = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RefPay = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $StatutFacture = null;

    #[ORM\ManyToOne(inversedBy: 'payements')]
    private ?commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePayement(): ?\DateTimeImmutable
    {
        return $this->DatePayement;
    }

    public function setDatePayement(\DateTimeImmutable $DatePayement): static
    {
        $this->DatePayement = $DatePayement;

        return $this;
    }

    public function getMontantTotal(): ?string
    {
        return $this->MontantTotal;
    }

    public function setMontantTotal(string $MontantTotal): static
    {
        $this->MontantTotal = $MontantTotal;

        return $this;
    }

    public function getMoyenPay(): ?string
    {
        return $this->MoyenPay;
    }

    public function setMoyenPay(?string $MoyenPay): static
    {
        $this->MoyenPay = $MoyenPay;

        return $this;
    }

    public function getRefPay(): ?string
    {
        return $this->RefPay;
    }

    public function setRefPay(?string $RefPay): static
    {
        $this->RefPay = $RefPay;

        return $this;
    }

    public function getStatutFacture(): ?string
    {
        return $this->StatutFacture;
    }

    public function setStatutFacture(?string $StatutFacture): static
    {
        $this->StatutFacture = $StatutFacture;

        return $this;
    }

    public function getCommande(): ?commande
    {
        return $this->commande;
    }

    public function setCommande(?commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
