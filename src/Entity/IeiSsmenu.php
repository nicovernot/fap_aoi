<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\IeiMenu;
/**
 * IeiSsmenu
 *
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"idmen": "exact"})
 * @ORM\Table(name="IEI_SSMENU")
 * @ORM\Entity
 */
class IeiSsmenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDSSM", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idssm;

    /**
     
     * @ORM\ManyToOne(targetEntity="App\Entity\IeiMenu", inversedBy="ssmenus")
     * @ORM\JoinColumn(name="idmen", referencedColumnName="idmen")  
     */
     private $idmen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SSMCOD", type="string", length=50, nullable=true)
     */
    private $ssmcod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SSMLIB", type="string", length=100, nullable=true)
     */
    private $ssmlib;

    /**
     * @var float|null
     *
     * @ORM\Column(name="SSMORD", type="float", precision=10, scale=0, nullable=true)
     */
    private $ssmord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SSMCOM", type="string", length=250, nullable=true)
     */
    private $ssmcom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SSMMAJ", type="date", nullable=true)
     */
    private $ssmmaj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SSMPHP", type="string", length=250, nullable=true)
     */
    private $ssmphp;

    public function getIdssm(): ?int
    {
        return $this->idssm;
    }

    public function getIdmen()
    {
       // var_dump(get_class($this->idmen));
        return $this->idmen;
    }

    public function setIdmen(?int $idmen): self
    {
        $this->idmen = $idmen;

        return $this;
    }

    public function getSsmcod(): ?string
    {
        return $this->ssmcod;
    }

    public function setSsmcod(?string $ssmcod): self
    {
        $this->ssmcod = $ssmcod;

        return $this;
    }

    public function getSsmlib(): ?string
    {
        return $this->ssmlib;
    }

    public function setSsmlib(?string $ssmlib): self
    {
        $this->ssmlib = $ssmlib;

        return $this;
    }

    public function getSsmord(): ?float
    {
        return $this->ssmord;
    }

    public function setSsmord(?float $ssmord): self
    {
        $this->ssmord = $ssmord;

        return $this;
    }

    public function getSsmcom(): ?string
    {
        return $this->ssmcom;
    }

    public function setSsmcom(?string $ssmcom): self
    {
        $this->ssmcom = $ssmcom;

        return $this;
    }

    public function getSsmmaj(): ?\DateTimeInterface
    {
        return $this->ssmmaj;
    }

    public function setSsmmaj(?\DateTimeInterface $ssmmaj): self
    {
        $this->ssmmaj = $ssmmaj;

        return $this;
    }

    public function getSsmphp(): ?string
    {
        return $this->ssmphp;
    }

    public function setSsmphp(?string $ssmphp): self
    {
        $this->ssmphp = $ssmphp;

        return $this;
    }


}
