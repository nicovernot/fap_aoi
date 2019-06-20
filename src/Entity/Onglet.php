<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OngletRepository")
 */
class Onglet
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
    private $ongcod;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $onglib;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongord;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $onglec;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongcre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongupd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongadm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongcom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ongmaj;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongphp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongsql;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongdef;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongsqlcre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongsqlupd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ongsqldel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ongcon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Champ", mappedBy="onglet")
     * @ApiSubresource
     */
    private $champs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ssmenu", inversedBy="onglet")
     * @ApiSubresource
     */
    private $ssmenu;

 

    public function __construct()
    {
        $this->champs = new ArrayCollection();
      //  $this->ssmenu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

  

    public function getOngord(): ?int
    {
        return $this->ongord;
    }

    public function setOngord(?int $ongord): self
    {
        $this->ongord = $ongord;

        return $this;
    }

    public function getOnglec(): ?int
    {
        return $this->onglec;
    }

    public function setOnglec(?int $onglec): self
    {
        $this->onglec = $onglec;

        return $this;
    }

    public function getOngcre(): ?int
    {
        return $this->ongcre;
    }

    public function setOngcre(?int $ongcre): self
    {
        $this->ongcre = $ongcre;

        return $this;
    }

    public function getOngupd(): ?int
    {
        return $this->ongupd;
    }

    public function setOngupd(?int $ongupd): self
    {
        $this->ongupd = $ongupd;

        return $this;
    }

    public function getOngadm(): ?int
    {
        return $this->ongadm;
    }

    public function setOngadm(?int $ongadm): self
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
        if($this->ongmaj){
            return $this-> ongmaj ;    
        }else
        {
            return $this-> ongmaj = new \DateTime('now');
        }
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

    public function getOngdef(): ?int
    {
        return $this->ongdef;
    }

    public function setOngdef(?int $ongdef): self
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

    public function getOngcon(): ?int
    {
        return $this->ongcon;
    }

    public function setOngcon(?int $ongcon): self
    {
        $this->ongcon = $ongcon;

        return $this;
    }

    /**
     * @return Collection|Champ[]
     */
    public function getChamps(): Collection
    {
         //$criteria = Criteria::create()
         //   ->orderBy(['chpord', 'ASC']);
        return $this->champs;
    }
    
  
    public function getChampsOrd()
    {
         $criteria = Criteria::create()
            //->andWhere(Criteria::expr()->eq('chprec', 1))
            ->orderBy(['chpord' => Criteria::ASC]);     
           
        return $this->getChamps()->matching($criteria);
    }

    public function addChamp(Champ $champ): self
    {
        if (!$this->champs->contains($champ)) {
            $this->champs[] = $champ;
            $champ->setOnglet($this);
        }

        return $this;
    }

    public function removeChamp(Champ $champ): self
    {
        if ($this->champs->contains($champ)) {
            $this->champs->removeElement($champ);
            // set the owning side to null (unless already changed)
            if ($champ->getOnglet() === $this) {
                $champ->setOnglet(null);
            }
        }

        return $this;
    }

 
      public function __toString()
    {
        return $this->getOngcod() ?: '';
    }

      public function getSsmenu(): ?Ssmenu
      {
          return $this->ssmenu;
      }

      public function setSsmenu(?Ssmenu $ssmenu): self
      {
          $this->ssmenu = $ssmenu;

          return $this;
      }
}
