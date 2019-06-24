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
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="abonnement")
     * @ORM\JoinColumn(nullable=false)
     * @ApiSubresource
     * 
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Magazine", inversedBy="abonnement")
     * @ORM\JoinColumn(nullable=false)
     * 
     * @ApiSubresource
     * 
     */
    private $magazine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $encours;

    private $datefin;
    
    private $nommagazine;

    private $etatabb;

    public function getEtatabb(): ?string
    {
        $month ="";
        $finp =  clone $this->date;
        $interval = new \DateInterval('P2M');
        $finp->add($interval);
       if ($finp > $this->getDatefin()) {
          $month = '<p class="bg-danger" >-2 mois</p>';
       }else{
        $month = '';
       }
            
            $etat = $this->encours;
            if ($etat=="true"){
                
                $this->etatabb = "<i class='far fa-calendar-check bg-success'>$month</i>";
                return $this->etatabb;

            }else{
                $this->etatabb = "<i class='fas fa-calendar-times bg-danger' style='font-size:26px'></i>";
                return $this->etatabb;
            }

        
    }

    public function setEtatabb(): self
    {
        $this->nommagazine = $titre;

        return $this;
    }

    public function getNommagazine(): ?string
    {
        
            $nom = $this->magazine;
            $this->nommagazine = $nom->getTitre();

        return $this->nommagazine;
        
    }

    public function setNommagazine(): self
    {
        $this->nommagazine = $titre;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        if($this->datefin){
            return $this-> datefin ;    
        }else
        {
            $interstr = "P";
            $df = $this->magazine->getNumerosparan();
            $interstr = $interstr.$df;
            $interstr = $interstr."M";
            $interval = new \DateInterval($interstr);
            $this-> datefin = clone $this->date;
            $this-> datefin = $this->datefin->add($interval);
            return $this-> datefin ;
        }
    }

    public function setDatefin(): self
    {
        $df = $this->magazine->getNumerosparan();
        $interval = new DateInterval('P.$df.M');
         
        $this->datefin = $this->date->add($interval);

        return $this;
    }



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
