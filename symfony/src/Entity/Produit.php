<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $libelleCourt;

    #[ORM\Column(type: "string", length: 250)]
    private string $libelleLong;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $prixAchatHT;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $prixVenteHT;

    #[ORM\Column(type: "integer")]
    private int $stockDisponible;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: "boolean")]
    private bool $produitActif;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: "produits")]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Fournisseur $fournisseur;

    #[ORM\ManyToOne(targetEntity: SousRubrique::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private SousRubrique $sousRubrique;

    // Getters & Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->libelleCourt;
    }

    public function setLibelleCourt(string $libelleCourt): static
    {
        $this->libelleCourt = $libelleCourt;

        return $this;
    }

    public function getLibelleLong(): ?string
    {
        return $this->libelleLong;
    }

    public function setLibelleLong(string $libelleLong): static
    {
        $this->libelleLong = $libelleLong;

        return $this;
    }

    public function getPrixAchatHT(): ?string
    {
        return $this->prixAchatHT;
    }

    public function setPrixAchatHT(string $prixAchatHT): static
    {
        $this->prixAchatHT = $prixAchatHT;

        return $this;
    }

    public function getPrixVenteHT(): ?string
    {
        return $this->prixVenteHT;
    }

    public function setPrixVenteHT(string $prixVenteHT): static
    {
        $this->prixVenteHT = $prixVenteHT;

        return $this;
    }

    public function getStockDisponible(): ?int
    {
        return $this->stockDisponible;
    }

    public function setStockDisponible(int $stockDisponible): static
    {
        $this->stockDisponible = $stockDisponible;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function isProduitActif(): ?bool
    {
        return $this->produitActif;
    }

    public function setProduitActif(bool $produitActif): static
    {
        $this->produitActif = $produitActif;

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

    public function getSousRubrique(): ?SousRubrique
    {
        return $this->sousRubrique;
    }

    public function setSousRubrique(?SousRubrique $sousRubrique): static
    {
        $this->sousRubrique = $sousRubrique;

        return $this;
    }
}
