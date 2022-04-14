<?php

namespace App\Entity;

use App\Repository\TransportParMissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransportParMissionRepository::class)
 */
class TransportParMission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheODE::class, inversedBy="transportParMissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Transport::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $transport;

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

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        return $this;
    }
}
