<?php

namespace App\Entity;

use App\Repository\CommunicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommunicationRepository::class)
 */
class Communication
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
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity=CommunicationParMission::class, mappedBy="communication")
     */
    private $communicationParMissions;

    public function __construct()
    {
        $this->communicationParMissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @return Collection<int, CommunicationParMission>
     */
    public function getCommunicationParMissions(): Collection
    {
        return $this->communicationParMissions;
    }

    public function addCommunicationParMission(CommunicationParMission $communicationParMission): self
    {
        if (!$this->communicationParMissions->contains($communicationParMission)) {
            $this->communicationParMissions[] = $communicationParMission;
            $communicationParMission->setCommunication($this);
        }

        return $this;
    }

    public function removeCommunicationParMission(CommunicationParMission $communicationParMission): self
    {
        if ($this->communicationParMissions->removeElement($communicationParMission)) {
            // set the owning side to null (unless already changed)
            if ($communicationParMission->getCommunication() === $this) {
                $communicationParMission->setCommunication(null);
            }
        }

        return $this;
    }
}
