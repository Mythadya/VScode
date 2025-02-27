<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: "documents")]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Commande $commande;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateDocument;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $montantTotalHT;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $montantTVA;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $montantTotalTTC;

    #[ORM\Column(type: "string", length: 50)]
    private string $modePaiement;

    #[ORM\Column(type: "string", length: 50)]
    private string $type;

    // Getters & Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDocument(): ?\DateTimeInterface
    {
        return $this->dateDocument;
    }

    public function setDateDocument(\DateTimeInterface $dateDocument): static
    {
        $this->dateDocument = $dateDocument;

        return $this;
    }

    public function getMontantTotalHT(): ?string
    {
        return $this->montantTotalHT;
    }

    public function setMontantTotalHT(string $montantTotalHT): static
    {
        $this->montantTotalHT = $montantTotalHT;

        return $this;
    }

    public function getMontantTVA(): ?string
    {
        return $this->montantTVA;
    }

    public function setMontantTVA(string $montantTVA): static
    {
        $this->montantTVA = $montantTVA;

        return $this;
    }

    public function getMontantTotalTTC(): ?string
    {
        return $this->montantTotalTTC;
    }

    public function setMontantTotalTTC(string $montantTotalTTC): static
    {
        $this->montantTotalTTC = $montantTotalTTC;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
