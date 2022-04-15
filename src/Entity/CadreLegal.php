<?php

namespace App\Entity;

use App\Repository\CadreLegalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CadreLegalRepository::class)
 */
class CadreLegal
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=FicheODE::class, mappedBy="cadreLegal")
     */
    private $fichesOde;

    public function __construct()
    {
        $this->fichesOde = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->libelle;
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
    public function getFichesOde(): Collection
    {
        return $this->fichesOde;
    }

    public function addFichesOde(FicheODE $fichesOde): self
    {
        if (!$this->fichesOde->contains($fichesOde)) {
            $this->fichesOde[] = $fichesOde;
            $fichesOde->setCadreLegal($this);
        }

        return $this;
    }

    public function removeFichesOde(FicheODE $fichesOde): self
    {
        if ($this->fichesOde->removeElement($fichesOde)) {
            // set the owning side to null (unless already changed)
            if ($fichesOde->getCadreLegal() === $this) {
                $fichesOde->setCadreLegal(null);
            }
        }

        return $this;
    }
}
