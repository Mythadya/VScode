<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: "commandes")]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Client $client;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateCommande;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $montantTotalHT;

    #[ORM\Column(type: "string", length: 50)]
    private string $etatCommande;

    #[ORM\Column(type: "string", length: 50)]
    private string $modePaiement;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\OneToMany(mappedBy: "commande", targetEntity: Contient::class)]
    private Collection $produits;

    #[ORM\OneToMany(mappedBy: "commande", targetEntity: Document::class)]
    private Collection $documents;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    // Getters & Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

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

    public function getEtatCommande(): ?string
    {
        return $this->etatCommande;
    }

    public function setEtatCommande(string $etatCommande): static
    {
        $this->etatCommande = $etatCommande;

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

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(?\DateTimeInterface $dateLivraison): static
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Contient>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Contient $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setCommande($this);
        }

        return $this;
    }

    public function removeProduit(Contient $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCommande() === $this) {
                $produit->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setCommande($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCommande() === $this) {
                $document->setCommande(null);
            }
        }

        return $this;
    }
}
