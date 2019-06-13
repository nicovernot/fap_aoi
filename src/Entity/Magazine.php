<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MagazineRepository")
 */
class Magazine
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
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Abonnement", mappedBy="magazine", cascade={"persist", "remove"})
     */
    private $abonnement;

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

    public function getAbonnement(): ?Abonnement
    {
        return $this->abonnement;
    }

    public function setAbonnement(Abonnement $abonnement): self
    {
        $this->abonnement = $abonnement;

        // set the owning side of the relation if necessary
        if ($this !== $abonnement->getMagazine()) {
            $abonnement->setMagazine($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getTitre() ?: '';
    }
}
