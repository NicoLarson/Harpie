<?php

namespace App\Entity;

use App\Repository\EffectifPirogierParMissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EffectifPirogierParMissionRepository::class)
 */
class EffectifPirogierParMission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheODE::class, inversedBy="effectifPirogierParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Effectif::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $effectif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroMission(): ?FicheODE
    {
        return $this->numeroMission;
    }

    public function setNumeroMission(?FicheODE $numeroMission): self
    {
        $this->numeroMission = $numeroMission;

        return $this;
    }

    public function getEffectif(): ?Effectif
    {
        return $this->effectif;
    }

    public function setEffectif(?Effectif $effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }
}
