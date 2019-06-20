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
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
    private $mencod;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $menlib;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $menord;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mencom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $mendat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $menphp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mensql;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ssmenu", mappedBy="menu")
     * @ApiSubresource
     */
    private $ssmenus;

    public function __construct()
    {
        $this->ssmenus = new ArrayCollection();
        $this->mendate = new \DateTime('now');
    }

  



    public function getId(): ?int
    {
        return $this->id;
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

    public function getMenord(): ?int
    {
        return $this->menord;
    }

    public function setMenord(?int $menord): self
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
        if($this->mendat){
            return $this-> mendat ;    
        }else
        {
            return $this-> mendat = new \DateTime('now');
        }
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



     public function __toString()
    {
        return $this->getMenlib() ?: '';
    }

     /**
      * @return Collection|Ssmenu[]
      */
     public function getSsmenus(): Collection
     {
         return $this->ssmenus;
     }
     
      /**
      * @return Collection|Ssmenu[]
      */
     public function getSsmenusChildren(?string $id): Collection
     {
         $id = intval($id);
     //retourne tout les enfants de l'objet courrant
         return $this->ssmenus->filter(function(Ssmenu $ssm) {
            return $ssm->getSsmenus = 1;
        });
     }
      /**
      * @return Collection|Ssmenu[]
      */     
     public function getSsmenusChildren1(?string $id): Collection
    {
         $id= intval($id);
        $criteria = Criteria::create()
        ->andWhere(Criteria::expr()->eq('menu', $id));
        return $this->getSsmenus()->matching($criteria);
    }
    
      /**
      * @return Collection|Ssmenu[]
      */     
     public function getSsm1(Menu $menu): Collection
    {
         
        $criteria = Criteria::create()
        ->andWhere(Criteria::expr()->eq('menu', $menu));
        return $this->getSsmenus()->matching($criteria);
    }

     public function addSsmenu(Ssmenu $ssmenu): self
     {
         if (!$this->ssmenus->contains($ssmenu)) {
             $this->ssmenus[] = $ssmenu;
             $ssmenu->setMenu($this);
         }

         return $this;
     }

     public function removeSsmenu(Ssmenu $ssmenu): self
     {
         if ($this->ssmenus->contains($ssmenu)) {
             $this->ssmenus->removeElement($ssmenu);
             // set the owning side to null (unless already changed)
             if ($ssmenu->getMenu() === $this) {
                 $ssmenu->setMenu(null);
             }
         }

         return $this;
     }
}
