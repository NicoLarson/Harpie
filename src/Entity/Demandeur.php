<?php

namespace App\Entity;

use App\Repository\DemandeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeurRepository::class)
 */
class Demandeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $numeroIdentifiantGendarme;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=FicheODE::class, mappedBy="demandeur")
     */
    private $fichesODE;

    public function __construct()
    {
        $this->fichesODE = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->numeroIdentifiantGendarme;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroIdentifiantGendarme(): ?string
    {
        return $this->numeroIdentifiantGendarme;
    }

    public function setNumeroIdentifiantGendarme(string $numeroIdentifiantGendarme): self
    {
        $this->numeroIdentifiantGendarme = $numeroIdentifiantGendarme;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, FicheODE>
     */
    public function getFichesODE(): Collection
    {
        return $this->fichesODE;
    }

    public function addFichesODE(FicheODE $fichesODE): self
    {
        if (!$this->fichesODE->contains($fichesODE)) {
            $this->fichesODE[] = $fichesODE;
            $fichesODE->setDemandeur($this);
        }

        return $this;
    }

    public function removeFichesODE(FicheODE $fichesODE): self
    {
        if ($this->fichesODE->removeElement($fichesODE)) {
            // set the owning side to null (unless already changed)
            if ($fichesODE->getDemandeur() === $this) {
                $fichesODE->setDemandeur(null);
            }
        }

        return $this;
    }
}
