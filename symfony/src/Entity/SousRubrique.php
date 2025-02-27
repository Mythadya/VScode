<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: 'App\Repository\SousRubriqueRepository')]
#[ORM\Table(name: 'Sous_Rubrique')]
class SousRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "Id_Sous_Rubrique", type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $libelle;

    #[ORM\ManyToOne(targetEntity: Rubrique::class, inversedBy: "sousRubriques")]
    #[ORM\JoinColumn(name: "Id_Rubrique", referencedColumnName: "Id_Rubrique", onDelete: "CASCADE")]
    private ?Rubrique $rubrique = null;

    // Getters & Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): static
    {
        $this->rubrique = $rubrique;
        return $this;
    }
}
