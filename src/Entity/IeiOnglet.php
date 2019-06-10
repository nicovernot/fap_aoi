<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * IeiOnglet
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"idssm": "exact"})
 *
 * @ORM\Table(name="IEI_ONGLET")
 * @ORM\Entity
 */
class IeiOnglet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idong;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IDSSM", type="integer", nullable=true)
     */
    private $idssm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGCOD", type="string", length=50, nullable=true)
     */
    private $ongcod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGLIB", type="string", length=100, nullable=true)
     */
    private $onglib;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGORD", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongord;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGLEC", type="float", precision=10, scale=0, nullable=true)
     */
    private $onglec;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGCRE", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongcre;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGUPD", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongupd;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGADM", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongadm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGCOM", type="string", length=250, nullable=true)
     */
    private $ongcom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ONGMAJ", type="date", nullable=true)
     */
    private $ongmaj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGPHP", type="string", length=250, nullable=true)
     */
    private $ongphp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGSQL", type="string", length=200, nullable=true)
     */
    private $ongsql;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGDEF", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongdef;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGSQLCRE", type="string", length=100, nullable=true)
     */
    private $ongsqlcre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGSQLUPD", type="string", length=100, nullable=true)
     */
    private $ongsqlupd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGSQLDEL", type="string", length=100, nullable=true)
     */
    private $ongsqldel;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ONGCON", type="float", precision=10, scale=0, nullable=true)
     */
    private $ongcon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ONGSQLCON", type="string", length=250, nullable=true)
     */
    private $ongsqlcon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IeiChamps", mappedBy="idong")
     */
    private $ieiChamps;

    public function __construct()
    {
        $this->ieiChamps = new ArrayCollection();
    }

    public function getIdong(): ?int
    {
        return $this->idong;
    }

    public function getIdssm(): ?int
    {
        return $this->idssm;
    }

    public function setIdssm(?int $idssm): self
    {
        $this->idssm = $idssm;

        return $this;
    }

    public function getOngcod(): ?string
    {
        return $this->ongcod;
    }

    public function setOngcod(?string $ongcod): self
    {
        $this->ongcod = $ongcod;

        return $this;
    }

    public function getOnglib(): ?string
    {
        return $this->onglib;
    }

    public function setOnglib(?string $onglib): self
    {
        $this->onglib = $onglib;

        return $this;
    }

    public function getOngord(): ?float
    {
        return $this->ongord;
    }

    public function setOngord(?float $ongord): self
    {
        $this->ongord = $ongord;

        return $this;
    }

    public function getOnglec(): ?float
    {
        return $this->onglec;
    }

    public function setOnglec(?float $onglec): self
    {
        $this->onglec = $onglec;

        return $this;
    }

    public function getOngcre(): ?float
    {
        return $this->ongcre;
    }

    public function setOngcre(?float $ongcre): self
    {
        $this->ongcre = $ongcre;

        return $this;
    }

    public function getOngupd(): ?float
    {
        return $this->ongupd;
    }

    public function setOngupd(?float $ongupd): self
    {
        $this->ongupd = $ongupd;

        return $this;
    }

    public function getOngadm(): ?float
    {
        return $this->ongadm;
    }

    public function setOngadm(?float $ongadm): self
    {
        $this->ongadm = $ongadm;

        return $this;
    }

    public function getOngcom(): ?string
    {
        return $this->ongcom;
    }

    public function setOngcom(?string $ongcom): self
    {
        $this->ongcom = $ongcom;

        return $this;
    }

    public function getOngmaj(): ?\DateTimeInterface
    {
        return $this->ongmaj;
    }

    public function setOngmaj(?\DateTimeInterface $ongmaj): self
    {
        $this->ongmaj = $ongmaj;

        return $this;
    }

    public function getOngphp(): ?string
    {
        return $this->ongphp;
    }

    public function setOngphp(?string $ongphp): self
    {
        $this->ongphp = $ongphp;

        return $this;
    }

    public function getOngsql(): ?string
    {
        return $this->ongsql;
    }

    public function setOngsql(?string $ongsql): self
    {
        $this->ongsql = $ongsql;

        return $this;
    }

    public function getOngdef(): ?float
    {
        return $this->ongdef;
    }

    public function setOngdef(?float $ongdef): self
    {
        $this->ongdef = $ongdef;

        return $this;
    }

    public function getOngsqlcre(): ?string
    {
        return $this->ongsqlcre;
    }

    public function setOngsqlcre(?string $ongsqlcre): self
    {
        $this->ongsqlcre = $ongsqlcre;

        return $this;
    }

    public function getOngsqlupd(): ?string
    {
        return $this->ongsqlupd;
    }

    public function setOngsqlupd(?string $ongsqlupd): self
    {
        $this->ongsqlupd = $ongsqlupd;

        return $this;
    }

    public function getOngsqldel(): ?string
    {
        return $this->ongsqldel;
    }

    public function setOngsqldel(?string $ongsqldel): self
    {
        $this->ongsqldel = $ongsqldel;

        return $this;
    }

    public function getOngcon(): ?float
    {
        return $this->ongcon;
    }

    public function setOngcon(?float $ongcon): self
    {
        $this->ongcon = $ongcon;

        return $this;
    }

    public function getOngsqlcon(): ?string
    {
        return $this->ongsqlcon;
    }

    public function setOngsqlcon(?string $ongsqlcon): self
    {
        $this->ongsqlcon = $ongsqlcon;

        return $this;
    }

    /**
     * @return Collection|IeiChamps[]
     */
    public function getIeiChamps(): Collection
    {
        return $this->ieiChamps;
    }

    public function addIeiChamp(IeiChamps $ieiChamp): self
    {
        if (!$this->ieiChamps->contains($ieiChamp)) {
            $this->ieiChamps[] = $ieiChamp;
            $ieiChamp->setIdong($this);
        }

        return $this;
    }

    public function removeIeiChamp(IeiChamps $ieiChamp): self
    {
        if ($this->ieiChamps->contains($ieiChamp)) {
            $this->ieiChamps->removeElement($ieiChamp);
            // set the owning side to null (unless already changed)
            if ($ieiChamp->getIdong() === $this) {
                $ieiChamp->setIdong(null);
            }
        }

        return $this;
    }

  public function __toString()
    {
        return $this->getOnglib() ?: '';
    }
}
