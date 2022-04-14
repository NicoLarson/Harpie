<?php

namespace App\Entity;

use App\Repository\CommunicationParMissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommunicationParMissionRepository::class)
 */
class CommunicationParMission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheODE::class, inversedBy="communicationParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Communication::class, inversedBy="communicationParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $communication;

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

    public function getCommunication(): ?Communication
    {
        return $this->communication;
    }

    public function setCommunication(?Communication $communication): self
    {
        $this->communication = $communication;

        return $this;
    }
}
