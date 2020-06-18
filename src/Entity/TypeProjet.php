<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeProjetRepository")
 */
class TypeProjet
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
     * @ORM\Column(type="string", length=600)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Place", mappedBy="typeprojet")
     */
    private $places;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="typeprojet")
     */
    private $projets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FamilleProjet", inversedBy="typeProjets")
     */
    private $familleprojet;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->projets = new ArrayCollection();
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places[] = $place;
            $place->setTypeprojet($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->places->contains($place)) {
            $this->places->removeElement($place);
            // set the owning side to null (unless already changed)
            if ($place->getTypeprojet() === $this) {
                $place->setTypeprojet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setTypeprojet($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getTypeprojet() === $this) {
                $projet->setTypeprojet(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom() ?: '';
    }

    public function getFamilleprojet(): ?FamilleProjet
    {
        return $this->familleprojet;
    }

    public function setFamilleprojet(?FamilleProjet $familleprojet): self
    {
        $this->familleprojet = $familleprojet;

        return $this;
    }
}
