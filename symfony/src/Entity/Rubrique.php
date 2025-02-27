<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: 'App\Repository\RubriqueRepository')]
#[ORM\Table(name: 'Rubrique')] // Assurez-vous d'avoir cette ligne avec un "R" majuscule
class Rubrique
{
    // Utilisation de "Id_Rubrique" pour le nom de la colonne et la clé primaire
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "Id_Rubrique", type: "integer")]  // Spécifie le nom de la colonne dans la base de données
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $libelle;

    #[ORM\OneToMany(mappedBy: "rubrique", targetEntity: SousRubrique::class, cascade: ["remove"])]
    private Collection $sousRubriques;

    public function __construct()
    {
        $this->sousRubriques = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, SousRubrique>
     */
    public function getSousRubriques(): Collection
    {
        return $this->sousRubriques;
    }

    public function addSousRubrique(SousRubrique $sousRubrique): static
    {
        if (!$this->sousRubriques->contains($sousRubrique)) {
            $this->sousRubriques->add($sousRubrique);
            $sousRubrique->setRubrique($this);
        }

        return $this;
    }

    public function removeSousRubrique(SousRubrique $sousRubrique): static
    {
        if ($this->sousRubriques->removeElement($sousRubrique)) {
            // set the owning side to null (unless already changed)
            if ($sousRubrique->getRubrique() === $this) {
                $sousRubrique->setRubrique(null);
            }
        }

        return $this;
    }
}