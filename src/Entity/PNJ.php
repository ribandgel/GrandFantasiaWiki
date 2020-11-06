<?php

namespace App\Entity;

use App\Repository\PNJRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PNJRepository::class)
 */
class PNJ
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="pNJ")
     */
    private $locations;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, mappedBy="pnjs")
     */
    private $items;

    /**
     * @ORM\OneToMany(targetEntity=Quest::class, mappedBy="acceptPnj", orphanRemoval=true)
     */
    private $acceptQuests;

    /**
     * @ORM\OneToMany(targetEntity=Quest::class, mappedBy="finishPnj", orphanRemoval=true)
     */
    private $finishQuests;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->acceptQuests = new ArrayCollection();
        $this->finishQuests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setPNJ($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getPNJ() === $this) {
                $location->setPNJ(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->addPnj($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            $item->removePnj($this);
        }

        return $this;
    }

    /**
     * @return Collection|Quest[]
     */
    public function getAcceptQuests(): Collection
    {
        return $this->acceptQuests;
    }

    public function addAcceptQuest(Quest $acceptQuest): self
    {
        if (!$this->acceptQuests->contains($acceptQuest)) {
            $this->acceptQuests[] = $acceptQuest;
            $acceptQuest->setAcceptPnj($this);
        }

        return $this;
    }

    public function removeAcceptQuest(Quest $acceptQuest): self
    {
        if ($this->acceptQuests->contains($acceptQuest)) {
            $this->acceptQuests->removeElement($acceptQuest);
            // set the owning side to null (unless already changed)
            if ($acceptQuest->getAcceptPnj() === $this) {
                $acceptQuest->setAcceptPnj(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Quest[]
     */
    public function getFinishQuests(): Collection
    {
        return $this->finishQuests;
    }

    public function addFinishQuest(Quest $finishQuest): self
    {
        if (!$this->finishQuests->contains($finishQuest)) {
            $this->finishQuests[] = $finishQuest;
            $finishQuest->setFinishPnj($this);
        }

        return $this;
    }

    public function removeFinishQuest(Quest $finishQuest): self
    {
        if ($this->finishQuests->contains($finishQuest)) {
            $this->finishQuests->removeElement($finishQuest);
            // set the owning side to null (unless already changed)
            if ($finishQuest->getFinishPnj() === $this) {
                $finishQuest->setFinishPnj(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
