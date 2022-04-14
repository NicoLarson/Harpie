<?php

namespace App\Entity;

use App\Repository\CibleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CibleRepository::class)
 */
class Cible
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $latitudeN;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $longitudeO;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=CibleParMission::class, mappedBy="cible")
     */
    private $cibleParMissions;

    public function __construct()
    {
        $this->cibleParMissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitudeN(): ?string
    {
        return $this->latitudeN;
    }

    public function setLatitudeN(string $latitudeN): self
    {
        $this->latitudeN = $latitudeN;

        return $this;
    }

    public function getLongitudeO(): ?string
    {
        return $this->longitudeO;
    }

    public function setLongitudeO(string $longitudeO): self
    {
        $this->longitudeO = $longitudeO;

        return $this;
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
     * @return Collection<int, CibleParMission>
     */
    public function getCibleParMissions(): Collection
    {
        return $this->cibleParMissions;
    }

    public function addCibleParMission(CibleParMission $cibleParMission): self
    {
        if (!$this->cibleParMissions->contains($cibleParMission)) {
            $this->cibleParMissions[] = $cibleParMission;
            $cibleParMission->setCible($this);
        }

        return $this;
    }

    public function removeCibleParMission(CibleParMission $cibleParMission): self
    {
        if ($this->cibleParMissions->removeElement($cibleParMission)) {
            // set the owning side to null (unless already changed)
            if ($cibleParMission->getCible() === $this) {
                $cibleParMission->setCible(null);
            }
        }

        return $this;
    }
}
