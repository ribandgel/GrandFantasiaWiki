<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatsRepository::class)
 */
class Stats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $effects;

    /**
     * @ORM\OneToMany(targetEntity=StatsLine::class, mappedBy="stats", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $statsLines;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spriteName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spriteDescription;

    /**
     * @ORM\JoinColumn(nullable=false)
     * @ORM\OneToOne(targetEntity=Item::class, mappedBy="stats", cascade={"persist", "remove"})
     */
    private $item;

    public function __construct()
    {
        $this->statsLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEffects(): ?string
    {
        return $this->effects;
    }

    public function setEffects(?string $effects): self
    {
        $this->effects = $effects;

        return $this;
    }

    /**
     * @return Collection|StatsLine[]
     */
    public function getStatsLines(): Collection
    {
        return $this->statsLines;
    }

    public function addStatsLine(StatsLine $statsLine): self
    {
        if (!$this->statsLines->contains($statsLine)) {
            $this->statsLines[] = $statsLine;
            $statsLine->setStats($this);
        }

        return $this;
    }

    public function removeStatsLine(StatsLine $statsLine): self
    {
        if ($this->statsLines->contains($statsLine)) {
            $this->statsLines->removeElement($statsLine);
            // set the owning side to null (unless already changed)
            if ($statsLine->getStats() === $this) {
                $statsLine->setStats(null);
            }
        }

        return $this;
    }

    public function getSpriteName(): ?string
    {
        return $this->spriteName;
    }

    public function setSpriteName(?string $spriteName): self
    {
        $this->spriteName = $spriteName;

        return $this;
    }

    public function getSpriteDescription(): ?string
    {
        return $this->spriteDescription;
    }

    public function setSpriteDescription(?string $spriteDescription): self
    {
        $this->spriteDescription = $spriteDescription;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        // set (or unset) the owning side of the relation if necessary
        $newStats = null === $item ? null : $this;
        if ($item->getStats() !== $newStats) {
            $item->setStats($newStats);
        }

        return $this;
    }

    public function __toString(){
        return (String) $this->id;
    }
}
