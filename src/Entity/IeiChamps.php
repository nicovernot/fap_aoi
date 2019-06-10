<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * IeiChamps
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"idong": "exact","chprec":"exact"})
 *

 *
 * @ORM\Table(name="iei_champs")
 * @ORM\Entity
 */
class IeiChamps
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDCHP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchp;



    /**
     * @var string|null
     *
     * @ORM\Column(name="CHPLIB", type="string", length=50, nullable=true)
     */
    private $chplib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CHPCHA", type="string", length=20, nullable=true)
     */
    private $chpcha;

    /**
     * @var float|null
     *
     * @ORM\Column(name="CHPORD", type="float", precision=10, scale=0, nullable=true)
     */
    private $chpord;

    /**
     * @var float|null
     *
     * @ORM\Column(name="CHPLON", type="float", precision=10, scale=0, nullable=true)
     */
    private $chplon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CHPTYP", type="string", length=20, nullable=true)
     */
    private $chptyp;

    /**
     * @var float|null
     *
     * @ORM\Column(name="CHPSAI", type="float", precision=10, scale=0, nullable=true)
     */
    private $chpsai;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CHPSEL", type="string", length=500, nullable=true)
     */
    private $chpsel;

    /**
     * @var float|null
     *
     * @ORM\Column(name="CHPREC", type="float", precision=10, scale=0, nullable=true)
     */
    private $chprec;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IeiOnglet", inversedBy="ieiChamps")
     * @ORM\JoinColumn(name="idong", referencedColumnName="idong") 
     */
    private $idong;

    public function getIdchp(): ?int
    {
        return $this->idchp;
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

    public function getChpord(): ?float
    {
        return $this->chpord;
    }

    public function setChpord(?float $chpord): self
    {
        $this->chpord = $chpord;

        return $this;
    }

    public function getChplon(): ?float
    {
        return $this->chplon;
    }

    public function setChplon(?float $chplon): self
    {
        $this->chplon = $chplon;

        return $this;
    }

    public function getChptyp(): ?string
    {
        return $this->chptyp;
    }

    public function setChptyp(?string $chptyp): self
    {
        $this->chptyp = $chptyp;

        return $this;
    }

    public function getChpsai(): ?float
    {
        return $this->chpsai;
    }

    public function setChpsai(?float $chpsai): self
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

    public function getChprec(): ?float
    {
        return $this->chprec;
    }

    public function setChprec(?float $chprec): self
    {
        $this->chprec = $chprec;

        return $this;
    }

    public function getIdong(): ?IeiOnglet
    {
        return $this->idong;
    }

    public function setIdong(?IeiOnglet $idong): self
    {
        $this->idong = $idong;

        return $this;
    }


}
