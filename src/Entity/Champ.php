<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource(attributes={"order"={"chpord": "ASC"}})
 * @ORM\Entity(repositoryClass="App\Repository\ChampRepository")
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "onglet": "exact", "chpcha": "exact"})
 */
class Champ
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chpcha;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chpord;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chplon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chptyp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chpsai;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chpsel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chprec;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Onglet", inversedBy="champs")
     * @ApiSubresource
     */
    private $onglet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chplib;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getChplib(): ?string
    {
        return $this->chplib;
    }

    public function setChplib(?string $chplib): self
    {
        $this->chplib = $chplib;

        return $this;
    }

    public function getChpcha(): ?string
    {
        return $this->chpcha;
    }

    public function setChpcha(?string $chpcha): self
    {
        $this->chpcha = $chpcha;

        return $this;
    }

    public function getChpord(): ?int
    {
        return $this->chpord;
    }

    public function setChpord(?int $chpord): self
    {
        $this->chpord = $chpord;

        return $this;
    }

    public function getChplon(): ?int
    {
        return $this->chplon;
    }

    public function setChplon(?int $chplon): self
    {
        $this->chplon = $chplon;

        return $this;
    }

    public function getChptyp(): ?string
    {
        return $this->chptyp;
    }

    public function setChptyp(string $chptyp): self
    {
        $this->chptyp = $chptyp;

        return $this;
    }

    public function getChpsai(): ?int
    {
        return $this->chpsai;
    }

    public function setChpsai(?int $chpsai): self
    {
        $this->chpsai = $chpsai;

        return $this;
    }

    public function getChpsel(): ?string
    {
        return $this->chpsel;
    }

    public function setChpsel(?string $chpsel): self
    {
        $this->chpsel = $chpsel;

        return $this;
    }

    public function getChprec(): ?int
    {
        return $this->chprec;
    }

    public function setChprec(?int $chprec): self
    {
        $this->chprec = $chprec;

        return $this;
    }


    public function getOnglet(): ?Onglet
    {
        return $this->onglet;
    }

    public function setOnglet(?Onglet $onglet): self
    {
        $this->onglet = $onglet;

        return $this;
    }
}
