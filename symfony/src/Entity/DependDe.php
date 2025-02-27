<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class DependDe
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Rubrique::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Rubrique $rubrique;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: SousRubrique::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private SousRubrique $sousRubrique;

    // Getters & Setters

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): static
    {
        $this->rubrique = $rubrique;

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
