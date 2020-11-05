<?php

namespace App\Entity;

use App\Repository\QuestDescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestDescriptionRepository::class)
 */
class QuestDescription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PNJ::class)
     */
    private $pnj;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Quest::class, mappedBy="accept", cascade={"persist", "remove"})
     */
    private $quest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPnj(): ?PNJ
    {
        return $this->pnj;
    }

    public function setPnj(?PNJ $pnj): self
    {
        $this->pnj = $pnj;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): self
    {
        $this->quest = $quest;

        // set (or unset) the owning side of the relation if necessary
        $newAccept = null === $quest ? null : $this;
        if ($quest->getAccept() !== $newAccept) {
            $quest->setAccept($newAccept);
        }

        return $this;
    }
}
