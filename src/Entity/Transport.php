<?php

namespace App\Entity;

use App\Repository\TransportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransportRepository::class)
 */
class Transport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=TransportSousCategorie::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCategorie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $appuiFeu;
    public function __toString()
    {
        return $this->libelle;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSousCategorie(): ?TransportSousCategorie
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?TransportSousCategorie $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    public function getAppuiFeu(): ?bool
    {
        return $this->appuiFeu;
    }

    public function setAppuiFeu(?bool $appuiFeu): self
    {
        $this->appuiFeu = $appuiFeu;

        return $this;
    }
}
