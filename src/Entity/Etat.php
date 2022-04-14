<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtatRepository::class)
 */
class Etat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=FicheODE::class, mappedBy="etat")
     */
    private $fichesODE;

    public function __construct()
    {
        $this->fichesODE = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $fichesODE->setEtat($this);
        }

        return $this;
    }

    public function removeFichesODE(FicheODE $fichesODE): self
    {
        if ($this->fichesODE->removeElement($fichesODE)) {
            // set the owning side to null (unless already changed)
            if ($fichesODE->getEtat() === $this) {
                $fichesODE->setEtat(null);
            }
        }

        return $this;
    }
}
