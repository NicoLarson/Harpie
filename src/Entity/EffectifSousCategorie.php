<?php

namespace App\Entity;

use App\Repository\EffectifSousCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EffectifSousCategorieRepository::class)
 */
class EffectifSousCategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Effectif::class, mappedBy="effectifSousCategorie")
     */
    private $effectifs;

    public function __construct()
    {
        $this->effectifs = new ArrayCollection();
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
     * @return Collection<int, Effectif>
     */
    public function getEffectifs(): Collection
    {
        return $this->effectifs;
    }

    public function addEffectif(Effectif $effectif): self
    {
        if (!$this->effectifs->contains($effectif)) {
            $this->effectifs[] = $effectif;
            $effectif->setEffectifSousCategorie($this);
        }

        return $this;
    }

    public function removeEffectif(Effectif $effectif): self
    {
        if ($this->effectifs->removeElement($effectif)) {
            // set the owning side to null (unless already changed)
            if ($effectif->getEffectifSousCategorie() === $this) {
                $effectif->setEffectifSousCategorie(null);
            }
        }

        return $this;
    }
}
