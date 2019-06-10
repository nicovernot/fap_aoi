<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * IeiMenu
 *
 * @ApiResource
 * @ApiFilter(OrderFilter::class, properties={"iei_ssmenu.mencod"})
 * @ApiFilter(SearchFilter::class, properties={"idmen": "exact", "mencod": "exact", "mendat": "partial"})
 * @ORM\Table(name="IEI_MENU")
 * @ORM\Entity
 */
class IeiMenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
     private  $idmen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MENCOD", type="string", length=50, nullable=true)
     */
    private $mencod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MENLIB", type="string", length=100, nullable=true)
     */
    private $menlib;

    /**
     * @var float|null
     *
     * @ORM\Column(name="MENORD", type="float", precision=10, scale=0, nullable=true)
     */
    private $menord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MENCOM", type="string", length=250, nullable=true)
     */
    private $mencom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="MENDAT", type="date", nullable=true)
     */
    private $mendat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MENPHP", type="string", length=50, nullable=true)
     */
    private $menphp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MENSQL", type="string", length=20, nullable=true)
     */
    private $mensql;  
     
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\IeiSsmenu", mappedBy="idmen")
     * @ORM\JoinColumn(name="idmen", referencedColumnName="idmen")
     */
    private $ssmenus;

    public function __construct()
    {
        $this->ssmenus = new ArrayCollection();
    }
   


  public function getIdmen(): ?int
    {
        return $this->idmen;
    }

    public function getMencod(): ?string
    {
        return $this->mencod;
    }

    public function setMencod(?string $mencod): self
    {
        $this->mencod = $mencod;

        return $this;
    }

    public function getMenlib(): ?string
    {
        return $this->menlib;
    }

    public function setMenlib(?string $menlib): self
    {
        $this->menlib = $menlib;

        return $this;
    }

    public function getMenord(): ?float
    {
        return $this->menord;
    }

    public function setMenord(?float $menord): self
    {
        $this->menord = $menord;

        return $this;
    }

    public function getMencom(): ?string
    {
        return $this->mencom;
    }

    public function setMencom(?string $mencom): self
    {
        $this->mencom = $mencom;

        return $this;
    }

    public function getMendat(): ?\DateTimeInterface
    {
        return $this->mendat;
    }

    public function setMendat(?\DateTimeInterface $mendat): self
    {
        $this->mendat = $mendat;

        return $this;
    }

    public function getMenphp(): ?string
    {
        return $this->menphp;
    }

    public function setMenphp(?string $menphp): self
    {
        $this->menphp = $menphp;

        return $this;
    }

    public function getMensql(): ?string
    {
        return $this->mensql;
    }

    public function setMensql(?string $mensql): self
    {
        $this->mensql = $mensql;

        return $this;
    }

    /**
     * @return Collection|IeiSsmenu[]
     */
    public function getSsmenus(): Collection
    {
        return $this->ssmenus;
    }

    public function addSsmenu(IeiSsmenu $ssmenu): self
    {
        if (!$this->ssmenus->contains($ssmenu)) {
            $this->ssmenus[] = $ssmenu;
            $ssmenu->setIdmen($this);
        }

        return $this;
    }

    public function removeSsmenu(IeiSsmenu $ssmenu): self
    {
        if ($this->ssmenus->contains($ssmenu)) {
            $this->ssmenus->removeElement($ssmenu);
            // set the owning side to null (unless already changed)
            if ($ssmenu->getIdmen() === $this) {
                $ssmenu->setIdmen(null);
            }
        }

        return $this;
    }


  public function __toString()
    {
        return $this->getMenlib() ?: '';
    }
}
