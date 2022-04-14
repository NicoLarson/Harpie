<?php

namespace App\Entity;

use App\Repository\EffectifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EffectifRepository::class)
 */
class Effectif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=EffectifCategorie::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $effectifCategorie;

    /**
     * @ORM\ManyToOne(targetEntity=EffectifSousCategorie::class, inversedBy="effectifs")
     */
    private $effectifSousCategorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $volume;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEffectifCategorie(): ?EffectifCategorie
    {
        return $this->effectifCategorie;
    }

    public function setEffectifCategorie(?EffectifCategorie $effectifCategorie): self
    {
        $this->effectifCategorie = $effectifCategorie;

        return $this;
    }

    public function getEffectifSousCategorie(): ?EffectifSousCategorie
    {
        return $this->effectifSousCategorie;
    }

    public function setEffectifSousCategorie(?EffectifSousCategorie $effectifSousCategorie): self
    {
        $this->effectifSousCategorie = $effectifSousCategorie;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): self
    {
        $this->volume = $volume;

        return $this;
    }
}
