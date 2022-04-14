<?php

namespace App\Entity;

use App\Repository\FicheODERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheODERepository::class)
 */
class FicheODE
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
    private $numeroMission;

    /**
     * @ORM\ManyToOne(targetEntity=Demandeur::class, inversedBy="fichesODE")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demandeur;

    /**
     * @ORM\ManyToOne(targetEntity=TypeMission::class, inversedBy="fichesODE")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeMission;

    /**
     * @ORM\ManyToOne(targetEntity=Force::class, inversedBy="fichesODE")
     * @ORM\JoinColumn(nullable=false)
     */
    private $force;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class, inversedBy="fichesODE")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDemande;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $denominationOperation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=CadreLegal::class, inversedBy="fichesOde")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cadreLegal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\OneToMany(targetEntity=EffectifParMission::class, mappedBy="numeroMission")
     */
    private $effectifParMissions;

    /**
     * @ORM\OneToMany(targetEntity=EffectifPirogierParMission::class, mappedBy="numeroMission")
     */
    private $effectifPirogierParMissions;

    /**
     * @ORM\OneToMany(targetEntity=CommunicationParMission::class, mappedBy="numeroMission")
     */
    private $communicationParMissions;

    /**
     * @ORM\OneToMany(targetEntity=ManoeuvreParMission::class, mappedBy="numeroMission")
     */
    private $manoeuvreParMissions;

    /**
     * @ORM\OneToMany(targetEntity=TransportParMission::class, mappedBy="numeroMission")
     */
    private $transportParMissions;

    /**
     * @ORM\OneToMany(targetEntity=CibleParMission::class, mappedBy="numeroMission")
     */
    private $cibleParMissions;

    public function __construct()
    {
        $this->effectifParMissions = new ArrayCollection();
        $this->effectifPirogierParMissions = new ArrayCollection();
        $this->communicationParMissions = new ArrayCollection();
        $this->manoeuvreParMissions = new ArrayCollection();
        $this->transportParMissions = new ArrayCollection();
        $this->cibleParMissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroMission(): ?string
    {
        return $this->numeroMission;
    }

    public function setNumeroMission(string $numeroMission): self
    {
        $this->numeroMission = $numeroMission;

        return $this;
    }

    public function getDemandeur(): ?Demandeur
    {
        return $this->demandeur;
    }

    public function setDemandeur(?Demandeur $demandeur): self
    {
        $this->demandeur = $demandeur;

        return $this;
    }

    public function getTypeMission(): ?TypeMission
    {
        return $this->typeMission;
    }

    public function setTypeMission(?TypeMission $typeMission): self
    {
        $this->typeMission = $typeMission;

        return $this;
    }

    public function getForce(): ?Force
    {
        return $this->force;
    }

    public function setForce(?Force $force): self
    {
        $this->force = $force;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getDenominationOperation(): ?string
    {
        return $this->denominationOperation;
    }

    public function setDenominationOperation(?string $denominationOperation): self
    {
        $this->denominationOperation = $denominationOperation;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getCadreLegal(): ?CadreLegal
    {
        return $this->cadreLegal;
    }

    public function setCadreLegal(?CadreLegal $cadreLegal): self
    {
        $this->cadreLegal = $cadreLegal;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * @return Collection<int, EffectifParMission>
     */
    public function getEffectifParMissions(): Collection
    {
        return $this->effectifParMissions;
    }

    public function addEffectifParMission(EffectifParMission $effectifParMission): self
    {
        if (!$this->effectifParMissions->contains($effectifParMission)) {
            $this->effectifParMissions[] = $effectifParMission;
            $effectifParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeEffectifParMission(EffectifParMission $effectifParMission): self
    {
        if ($this->effectifParMissions->removeElement($effectifParMission)) {
            // set the owning side to null (unless already changed)
            if ($effectifParMission->getNumeroMission() === $this) {
                $effectifParMission->setNumeroMission(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EffectifPirogierParMission>
     */
    public function getEffectifPirogierParMissions(): Collection
    {
        return $this->effectifPirogierParMissions;
    }

    public function addEffectifPirogierParMission(EffectifPirogierParMission $effectifPirogierParMission): self
    {
        if (!$this->effectifPirogierParMissions->contains($effectifPirogierParMission)) {
            $this->effectifPirogierParMissions[] = $effectifPirogierParMission;
            $effectifPirogierParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeEffectifPirogierParMission(EffectifPirogierParMission $effectifPirogierParMission): self
    {
        if ($this->effectifPirogierParMissions->removeElement($effectifPirogierParMission)) {
            // set the owning side to null (unless already changed)
            if ($effectifPirogierParMission->getNumeroMission() === $this) {
                $effectifPirogierParMission->setNumeroMission(null);
            }
        }

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
            $communicationParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeCommunicationParMission(CommunicationParMission $communicationParMission): self
    {
        if ($this->communicationParMissions->removeElement($communicationParMission)) {
            // set the owning side to null (unless already changed)
            if ($communicationParMission->getNumeroMission() === $this) {
                $communicationParMission->setNumeroMission(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ManoeuvreParMission>
     */
    public function getManoeuvreParMissions(): Collection
    {
        return $this->manoeuvreParMissions;
    }

    public function addManoeuvreParMission(ManoeuvreParMission $manoeuvreParMission): self
    {
        if (!$this->manoeuvreParMissions->contains($manoeuvreParMission)) {
            $this->manoeuvreParMissions[] = $manoeuvreParMission;
            $manoeuvreParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeManoeuvreParMission(ManoeuvreParMission $manoeuvreParMission): self
    {
        if ($this->manoeuvreParMissions->removeElement($manoeuvreParMission)) {
            // set the owning side to null (unless already changed)
            if ($manoeuvreParMission->getNumeroMission() === $this) {
                $manoeuvreParMission->setNumeroMission(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TransportParMission>
     */
    public function getTransportParMissions(): Collection
    {
        return $this->transportParMissions;
    }

    public function addTransportParMission(TransportParMission $transportParMission): self
    {
        if (!$this->transportParMissions->contains($transportParMission)) {
            $this->transportParMissions[] = $transportParMission;
            $transportParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeTransportParMission(TransportParMission $transportParMission): self
    {
        if ($this->transportParMissions->removeElement($transportParMission)) {
            // set the owning side to null (unless already changed)
            if ($transportParMission->getNumeroMission() === $this) {
                $transportParMission->setNumeroMission(null);
            }
        }

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
            $cibleParMission->setNumeroMission($this);
        }

        return $this;
    }

    public function removeCibleParMission(CibleParMission $cibleParMission): self
    {
        if ($this->cibleParMissions->removeElement($cibleParMission)) {
            // set the owning side to null (unless already changed)
            if ($cibleParMission->getNumeroMission() === $this) {
                $cibleParMission->setNumeroMission(null);
            }
        }

        return $this;
    }
}
