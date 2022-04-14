<?php

namespace App\Entity;

use App\Repository\CibleParMissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CibleParMissionRepository::class)
 */
class CibleParMission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheODE::class, inversedBy="cibleParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Cible::class, inversedBy="cibleParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cible;

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

    public function getCible(): ?Cible
    {
        return $this->cible;
    }

    public function setCible(?Cible $cible): self
    {
        $this->cible = $cible;

        return $this;
    }
}
