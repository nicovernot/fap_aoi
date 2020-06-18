<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $nrue;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nomrue;

    /**
     * @ORM\Column(type="integer")
     */
    private $codepostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="adress")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnergieApresTravaux")
     */
    private $energie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeHabitation")
     */
    private $typehabitat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TailleSurface")
     */
    private $taillesurface;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departement")
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="adress")
     */
    private $projet;

    public function __construct()
    {
        $this->projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNrue(): ?int
    {
        return $this->nrue;
    }

    public function setNrue(int $nrue): self
    {
        $this->nrue = $nrue;

        return $this;
    }

    public function getNomrue(): ?string
    {
        return $this->nomrue;
    }

    public function setNomrue(string $nomrue): self
    {
        $this->nomrue = $nomrue;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function __toString()
    {
        $retour =$this->getVille().' '.$this->getNrue().' '.$this->getNomrue().' '.$this->getCodepostal();
        return $retour ?: '';
    }

    public function getEnergie(): ?EnergieApresTravaux
    {
        return $this->energie;
    }

    public function setEnergie(?EnergieApresTravaux $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getTypehabitat(): ?TypeHabitation
    {
        return $this->typehabitat;
    }

    public function setTypehabitat(?TypeHabitation $typehabitat): self
    {
        $this->typehabitat = $typehabitat;

        return $this;
    }

    public function getTaillesurface(): ?TailleSurface
    {
        return $this->taillesurface;
    }

    public function setTaillesurface(?TailleSurface $taillesurface): self
    {
        $this->taillesurface = $taillesurface;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet[] = $projet;
            $projet->setAdress($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projet->contains($projet)) {
            $this->projet->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getAdress() === $this) {
                $projet->setAdress(null);
            }
        }

        return $this;
    }
}

