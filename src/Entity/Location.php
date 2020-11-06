<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
    private $mapName;

    /**
     * @ORM\Column(type="float")
     */
    private $x;

    /**
     * @ORM\Column(type="float")
     */
    private $y;

    /**
     * @ORM\ManyToOne(targetEntity=PNJ::class, inversedBy="locations")
     */
    private $pNJ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMapName(): ?string
    {
        return $this->mapName;
    }

    public function setMapName(string $mapName): self
    {
        $this->mapName = $mapName;

        return $this;
    }

    public function getX(): ?float
    {
        return $this->x;
    }

    public function setX(float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?float
    {
        return $this->y;
    }

    public function setY(float $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getPNJ(): ?PNJ
    {
        return $this->pNJ;
    }

    public function setPNJ(?PNJ $pNJ): self
    {
        $this->pNJ = $pNJ;

        return $this;
    }

    public function __toString(){
        return $this->mapName . ' X:' . $this->x . ' Y:' . $this->y;
    }
}
