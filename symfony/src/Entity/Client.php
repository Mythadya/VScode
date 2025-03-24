<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: "Client")]
class Client implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $nom;

    #[ORM\Column(type: "string", length: 100)]
    private string $prenom;

    #[ORM\Column(type: "string", length: 150)]
    private string $email;

    #[ORM\Column(type: "string", length: 15)]
    private string $telephone;

    #[ORM\Column(type: "string", length: 50)]
    private string $typeClient;

    #[ORM\Column(type: "decimal", precision: 5, scale: 2)]
    private float $coefficient;

    #[ORM\Column(type: "string", length: 150)]
    private string $adresseFacturation;

    #[ORM\Column(type: "string", length: 150)]
    private string $adresseLivraison;

    #[ORM\Column(type: "string", length: 50)]
    private string $refClient;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $nomCommercial = null;

    #[ORM\Column(type: "string", length: 150)]
    private string $Mots_De_Passe; // Utilisation de "Mots_De_Passe" pour la colonne

    #[ORM\Column(type: "string", length: 14, nullable: true)]
    private ?string $numeroSiret = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $role = 'ROLE_USER'; // Valeur par défaut

    #[ORM\OneToMany(mappedBy: "client", targetEntity: Commande::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    // Getters & Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->typeClient;
    }

    public function setTypeClient(string $typeClient): static
    {
        $this->typeClient = $typeClient;
        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): static
    {
        $this->coefficient = $coefficient;
        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(string $adresseFacturation): static
    {
        $this->adresseFacturation = $adresseFacturation;
        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): static
    {
        $this->adresseLivraison = $adresseLivraison;
        return $this;
    }

    public function getRefClient(): ?string
    {
        return $this->refClient;
    }

    public function setRefClient(string $refClient): static
    {
        $this->refClient = $refClient;
        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(?string $nomCommercial): static
    {
        $this->nomCommercial = $nomCommercial;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->Mots_De_Passe;
    }

    public function setPassword(string $Mots_De_Passe): static
    {
        $this->Mots_De_Passe = $Mots_De_Passe;
        return $this;
    }

    public function getNumeroSiret(): ?string
    {
        return $this->numeroSiret;
    }

    public function setNumeroSiret(?string $numeroSiret): static
    {
        $this->numeroSiret = $numeroSiret;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
        // Symfony demande cette fonction même si on ne l'utilise pas
    }

    // Correction de getRole() => getRoles()
    public function getRoles(): array
    {
        return [$this->role]; // Symfony attend un tableau de rôles
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setClient($this);
        }
        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }
        return $this;
    }
}
