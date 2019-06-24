<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MagazineRepository")
 * @ApiFilter(SearchFilter::class, properties={"id": "exact"}) 
 */
class Magazine
{
    private $tokenStorage;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $numerosparan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;

    /**
     * @ORM\Column(type="float")
     */
    private $prixann;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", inversedBy="magazine", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @ApiSubresource
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Abonnement", mappedBy="magazine")
     */
    private $abonnement;

    public function __construct()
    {
        $this->abonnement = new ArrayCollection();
      
    }
   
  

   private $imgfilename;



   public function getFilename(): ?string
   {

       return "<img id='tabimg' style='width:80px;height:100px;' src='/img/$this->image'>";
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNumerosparan(): ?int
    {
        return $this->numerosparan;
    }

    public function setNumerosparan(int $numerosparan): self
    {
        $this->numerosparan = $numerosparan;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getPrixann(): ?float
    {
        return $this->prixann;
    }

    public function setPrixann(float $prixann): self
    {
        $this->prixann = $prixann;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(Image $image): self
    {
        $this->image = $image;

        return $this;
    }

   
    public function __toString()
    {
        return $this->getTitre() ?: '';
    }

    /**
     * @return Collection|Abonnement[]
     */
    public function getAbonnement(): Collection
    {
        return $this->abonnement;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnement->contains($abonnement)) {
            $this->abonnement[] = $abonnement;
            $abonnement->setMagazine($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnement->contains($abonnement)) {
            $this->abonnement->removeElement($abonnement);
            // set the owning side to null (unless already changed)
            if ($abonnement->getMagazine() === $this) {
                $abonnement->setMagazine(null);
            }
        }

        return $this;
    }
}
