<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestRepository::class)
 */
class Quest
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
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rewardsLabel;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $expReward;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goldReward;

    /**
     * @ORM\Column(type="smallint")
     */
    private $requierementLevel;


    /**
     * @ORM\ManyToMany(targetEntity=Quest::class, inversedBy="previousQuests")
     */
    private $nextQuests;

    /**
     * @ORM\ManyToMany(targetEntity=Quest::class, mappedBy="nextQuests")
     */
    private $previousQuests;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, mappedBy="quests")
     */
    private $items;

    /**
     * @ORM\Column(type="text")
     */
    private $acceptDescription;

    /**
     * @ORM\Column(type="text")
     */
    private $finishDescription;

    /**
     * @ORM\ManyToOne(targetEntity=PNJ::class, inversedBy="acceptQuests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $acceptPnj;

    /**
     * @ORM\ManyToOne(targetEntity=PNJ::class, inversedBy="finishQuests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $finishPnj;

    public function __construct()
    {
        $this->nextQuests = new ArrayCollection();
        $this->previousQuests = new ArrayCollection();
        $this->items = new ArrayCollection();
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getRewardsLabel(): ?string
    {
        return $this->rewardsLabel;
    }

    public function setRewardsLabel(string $rewardsLabel): self
    {
        $this->rewardsLabel = $rewardsLabel;

        return $this;
    }

    public function getExpReward(): ?string
    {
        return $this->expReward;
    }

    public function setExpReward(?string $expReward): self
    {
        $this->expReward = $expReward;

        return $this;
    }

    public function getGoldReward(): ?int
    {
        return $this->goldReward;
    }

    public function setGoldReward(?int $goldReward): self
    {
        $this->goldReward = $goldReward;

        return $this;
    }

    public function getRequierementLevel(): ?int
    {
        return $this->requierementLevel;
    }

    public function setRequierementLevel(int $requierementLevel): self
    {
        $this->requierementLevel = $requierementLevel;

        return $this;
    }


    /**
     * @return Collection|self[]
     */
    public function getNextQuests(): Collection
    {
        return $this->nextQuests;
    }

    public function addNextQuest(self $nextQuest): self
    {
        if (!$this->nextQuests->contains($nextQuest)) {
            $this->nextQuests[] = $nextQuest;
        }

        return $this;
    }

    public function removeNextQuest(self $nextQuest): self
    {
        if ($this->nextQuests->contains($nextQuest)) {
            $this->nextQuests->removeElement($nextQuest);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPreviousQuests(): Collection
    {
        return $this->previousQuests;
    }

    public function addPreviousQuest(self $previousQuest): self
    {
        if (!$this->previousQuests->contains($previousQuest)) {
            $this->previousQuests[] = $previousQuest;
            $previousQuest->addNextQuest($this);
        }

        return $this;
    }

    public function removePreviousQuest(self $previousQuest): self
    {
        if ($this->previousQuests->contains($previousQuest)) {
            $this->previousQuests->removeElement($previousQuest);
            $previousQuest->removeNextQuest($this);
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
            $item->addQuest($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            $item->removeQuest($this);
        }

        return $this;
    }

    public function getAcceptDescription(): ?string
    {
        return $this->acceptDescription;
    }

    public function setAcceptDescription(string $acceptDescription): self
    {
        $this->acceptDescription = $acceptDescription;

        return $this;
    }

    public function getFinishDescription(): ?string
    {
        return $this->finishDescription;
    }

    public function setFinishDescription(string $finishDescription): self
    {
        $this->finishDescription = $finishDescription;

        return $this;
    }

    public function getAcceptPnj(): ?PNJ
    {
        return $this->acceptPnj;
    }

    public function setAcceptPnj(?PNJ $acceptPnj): self
    {
        $this->acceptPnj = $acceptPnj;

        return $this;
    }

    public function getFinishPnj(): ?PNJ
    {
        return $this->finishPnj;
    }

    public function setFinishPnj(?PNJ $finishPnj): self
    {
        $this->finishPnj = $finishPnj;

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
