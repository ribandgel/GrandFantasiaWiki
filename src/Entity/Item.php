<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\ManyToOne(targetEntity=ItemCategory::class, inversedBy="items")
     */
    private $itemCategory;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tradable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $usable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity=GameClass::class, inversedBy="items")
     */
    private $suitableClasses;

    /**
     * @ORM\ManyToOne(targetEntity=Set::class, inversedBy="items")
     */
    private $weaponSet;

    /**
     * @ORM\ManyToMany(targetEntity=Monster::class, inversedBy="items")
     */
    private $monsters;

    /**
     * @ORM\ManyToMany(targetEntity=Chest::class, inversedBy="items")
     */
    private $chests;

    /**
     * @ORM\ManyToMany(targetEntity=PNJ::class, inversedBy="items")
     */
    private $pnjs;

    /**
     * @ORM\OneToOne(targetEntity=Stats::class, inversedBy="item", cascade={"persist", "remove"})
     */
    private $stats;

    /**
     * @ORM\ManyToMany(targetEntity=Quest::class, inversedBy="items")
     */
    private $quests;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, inversedBy="craftingTargets")
     */
    private $ingredients;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, mappedBy="ingredients")
     */
    private $craftingTargets;

    public function __construct()
    {
        $this->suitableClasses = new ArrayCollection();
        $this->monsters = new ArrayCollection();
        $this->chest = new ArrayCollection();
        $this->pnj = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
        $this->craftingTargets = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getItemCategory(): ?ItemCategory
    {
        return $this->itemCategory;
    }

    public function setItemCategory(?ItemCategory $itemCategory): self
    {
        $this->itemCategory = $itemCategory;

        return $this;
    }

    public function getTradable(): ?bool
    {
        return $this->tradable;
    }

    public function setTradable(bool $tradable): self
    {
        $this->tradable = $tradable;

        return $this;
    }

    public function getUsable(): ?bool
    {
        return $this->usable;
    }

    public function setUsable(bool $usable): self
    {
        $this->usable = $usable;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|GameClass[]
     */
    public function getSuitableClasses(): Collection
    {
        return $this->suitableClasses;
    }

    public function addSuitableClass(GameClass $suitableClass): self
    {
        if (!$this->suitableClasses->contains($suitableClass)) {
            $this->suitableClasses[] = $suitableClass;
        }

        return $this;
    }

    public function removeSuitableClass(GameClass $suitableClass): self
    {
        if ($this->suitableClasses->contains($suitableClass)) {
            $this->suitableClasses->removeElement($suitableClass);
        }

        return $this;
    }

    public function getWeaponSet(): ?Set
    {
        return $this->weaponSet;
    }

    public function setWeaponSet(?Set $weaponSet): self
    {
        $this->weaponSet = $weaponSet;

        return $this;
    }

    /**
     * @return Collection|Monster[]
     */
    public function getMonsters(): Collection
    {
        return $this->monsters;
    }

    public function addMonster(Monster $monster): self
    {
        if (!$this->monsters->contains($monster)) {
            $this->monsters[] = $monster;
        }

        return $this;
    }

    public function removeMonster(Monster $monster): self
    {
        if ($this->monsters->contains($monster)) {
            $this->monsters->removeElement($monster);
        }

        return $this;
    }

    /**
     * @return Collection|Chest[]
     */
    public function getChests(): Collection
    {
        return $this->chests;
    }

    public function addChest(Chest $chest): self
    {
        if (!$this->chests->contains($chest)) {
            $this->chests[] = $chest;
        }

        return $this;
    }

    public function removeChest(Chest $chest): self
    {
        if ($this->chests->contains($chest)) {
            $this->chests->removeElement($chest);
        }

        return $this;
    }

    /**
     * @return Collection|PNJ[]
     */
    public function getPnjs(): Collection
    {
        return $this->pnjs;
    }

    public function addPnj(PNJ $pnj): self
    {
        if (!$this->pnjs->contains($pnj)) {
            $this->pnjs[] = $pnj;
        }

        return $this;
    }

    public function removePnj(PNJ $pnj): self
    {
        if ($this->pnjs->contains($pnj)) {
            $this->pnjs->removeElement($pnj);
        }

        return $this;
    }

    public function getStats(): ?Stats
    {
        return $this->stats;
    }

    public function setStats(?Stats $stats): self
    {
        $this->stats = $stats;

        return $this;
    }

    /**
     * @return Collection|Quest[]
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests[] = $quest;
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->contains($quest)) {
            $this->quests->removeElement($quest);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(self $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(self $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCraftingTargets(): Collection
    {
        return $this->craftingTargets;
    }

    public function addCraftingTarget(self $craftingTarget): self
    {
        if (!$this->craftingTargets->contains($craftingTarget)) {
            $this->craftingTargets[] = $craftingTarget;
            $craftingTarget->addIngredient($this);
        }

        return $this;
    }

    public function removeCraftingTarget(self $craftingTarget): self
    {
        if ($this->craftingTargets->contains($craftingTarget)) {
            $this->craftingTargets->removeElement($craftingTarget);
            $craftingTarget->removeIngredient($this);
        }

        return $this;
    }
}
