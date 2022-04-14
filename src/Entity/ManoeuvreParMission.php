<?php

namespace App\Entity;

use App\Repository\ManoeuvreParMissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ManoeuvreParMissionRepository::class)
 */
class ManoeuvreParMission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheODE::class, inversedBy="manoeuvreParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Manoeuvre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $manoeuvre;

    /**
     * @ORM\Column(type="text")
     */
    private $execution;

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

    public function getManoeuvre(): ?Manoeuvre
    {
        return $this->manoeuvre;
    }

    public function setManoeuvre(?Manoeuvre $manoeuvre): self
    {
        $this->manoeuvre = $manoeuvre;

        return $this;
    }

    public function getExecution(): ?string
    {
        return $this->execution;
    }

    public function setExecution(string $execution): self
    {
        $this->execution = $execution;

        return $this;
    }
}
