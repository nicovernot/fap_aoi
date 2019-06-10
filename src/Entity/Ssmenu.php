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
 * @ORM\Entity(repositoryClass="App\Repository\SsmenuRepository")
 */
class Ssmenu
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
    private $ssmcod;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ssmlib;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ssmord;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ssmcom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ssmmaj;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ssmphp;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Onglet", mappedBy="ssmenu")
     * @ApiSubresource
     */
    private $onglet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Menu", inversedBy="ssmenus")
     * @ORM\JoinColumn(nullable=false)
     * @ApiSubresource
     */
    private $menu;


    public function __construct()
    {
       // $this->menu = new ArrayCollection();
        $this->onglet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSsmord(): ?int
    {
        return $this->ssmord;
    }

    public function setSsmord(?int $ssmord): self
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

    

      public function __toString()
    {
        return $this->getSsmlib() ?: '';
    }

      /**
       * @return Collection|Onglet[]
       */
      public function getOnglet(): Collection
      {
          return $this->onglet;
      }
      
       /**
       * @return Collection|Onglet[]
       */
           public function getOngChildren(?string $id): Collection
     {
         return $this->onglet->filter(function(Onglet $ong) {
            return $ong->getId = 1;
        });
     }
     
       /**
       * @return Collection|Onglet[]
       */
           public function getOngbyId(?string $id): Collection
     {
        $id = intval($id) ;
        $criteria = Criteria::create()
        ->andWhere(Criteria::expr()->eq('id', $id));
        return $this->onglet->matching($criteria);
     }
     
       /**
       * @return Collection|Onglet[]
       */
           public function getOngChildrenDef(?string $id): Collection
     {
         return $this->onglet->filter(function(Onglet $ong) {
            return $ong->getOngdef()> 0;
        });
     }
     
       /**
       * @return Collection|Onglet[]
       */
           public function getOngChildren1(?string $id): Collection
     {
          $criteria = Criteria::create()
            ->andWhere(Criteria::expr()->eq('ongdef', 1));
          
        return $this->onglet->matching($criteria);
     }

      public function addOnglet(Onglet $onglet): self
      {
          if (!$this->onglet->contains($onglet)) {
              $this->onglet[] = $onglet;
              $onglet->setSsmenu($this);
          }

          return $this;
      }

      public function removeOnglet(Onglet $onglet): self
      {
          if ($this->onglet->contains($onglet)) {
              $this->onglet->removeElement($onglet);
              // set the owning side to null (unless already changed)
              if ($onglet->getSsmenu() === $this) {
                  $onglet->setSsmenu(null);
              }
          }

          return $this;
      }

      public function getMenu(): ?Menu
      {
          return $this->menu;
      }

      public function setMenu(?Menu $menu): self
      {
          $this->menu = $menu;

          return $this;
      }
}
