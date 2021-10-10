<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ChampTypeRepository")
 */
class ChampType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Champ", mappedBy="champType")
     */
    private $champs;

    public function __construct()
    {
        $this->champs = new ArrayCollection();
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Champ[]
     */
    public function getChamps(): Collection
    {
        return $this->champs;
    }

    public function addChamp(Champ $champ): self
    {
        if (!$this->champs->contains($champ)) {
            $this->champs[] = $champ;
            $champ->setChampType($this);
        }

        return $this;
    }

    public function removeChamp(Champ $champ): self
    {
        if ($this->champs->contains($champ)) {
            $this->champs->removeElement($champ);
            // set the owning side to null (unless already changed)
            if ($champ->getChampType() === $this) {
                $champ->setChampType(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->getName() ?: '';
    }
}
