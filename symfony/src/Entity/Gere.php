<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Gere
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Client::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Client $client;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Commercial::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Commercial $commercial;

    // Getters & Setters

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getCommercial(): ?Commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?Commercial $commercial): static
    {
        $this->commercial = $commercial;

        return $this;
    }
}
