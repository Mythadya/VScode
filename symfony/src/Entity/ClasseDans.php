<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ClasseDans
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Produit $produit;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: SousRubrique::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private SousRubrique $sousRubrique;

    // Getters & Setters

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

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
