<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\Criteria;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource()
 * 
 * @ApiFilter(SearchFilter::class, properties={"client": "exact","id":"exact"}) 
 * @ORM\Entity(repositoryClass="App\Repository\AbonnementRepository")
 */
class Abonnement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="abonnement")
     * @ORM\JoinColumn(nullable=false)
     * @ApiSubresource
     * 
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Magazine", inversedBy="abonnement")
     * @ORM\JoinColumn(nullable=false)
     * @ApiSubresource
     * 
     */
    private $magazine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $encours;

  

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDate(): ?\DateTimeInterface
    {
        if($this->date){
            return $this-> date ;    
        }else
        {
            return $this-> date = new \DateTime('now');
        }
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getMagazine(): ?Magazine
    {
        return $this->magazine;
    }

    public function setMagazine(?Magazine $magazine): self
    {
        $this->magazine = $magazine;

        return $this;
    }

    public function getEncours(): ?bool
    {
        return $this->encours;
    }

    public function setEncours(?bool $encours): self
    {
        $this->encours = $encours;

        return $this;
    }



   
}
