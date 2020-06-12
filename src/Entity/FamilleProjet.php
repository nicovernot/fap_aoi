<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\FamilleProjetRepository")
 */
class FamilleProjet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TypeProjet", mappedBy="familleprojet")
     */
    private $typeProjets;

    public function __construct()
    {
        $this->typeProjets = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function __toString()
    {
        return $this->getNom() ?: '';
    }

    /**
     * @return Collection|TypeProjet[]
     */
    public function getTypeProjets(): Collection
    {
        return $this->typeProjets;
    }

    public function addTypeProjet(TypeProjet $typeProjet): self
    {
        if (!$this->typeProjets->contains($typeProjet)) {
            $this->typeProjets[] = $typeProjet;
            $typeProjet->setFamilleprojet($this);
        }

        return $this;
    }

    public function removeTypeProjet(TypeProjet $typeProjet): self
    {
        if ($this->typeProjets->contains($typeProjet)) {
            $this->typeProjets->removeElement($typeProjet);
            // set the owning side to null (unless already changed)
            if ($typeProjet->getFamilleprojet() === $this) {
                $typeProjet->setFamilleprojet(null);
            }
        }

        return $this;
    }
}
