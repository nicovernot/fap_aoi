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

    private $status;

    private $prixapayer;
    
    public function getPriapayer(){
     $this->prixapayer =$this->magazine->getPrixann();
     return $this->prixapayer;
    }



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Paiement", mappedBy="abonnement", cascade={"persist", "remove"})
     */
    private $paiement;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $remboursement;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $dateremboursement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estpaye;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estprolonge;

    public function getStatus(): ?string
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
                
                $this->etatabb = "<i class='far fa-calendar-check bg-success' style='font-size:20px'>$month</i>";
                return $this->etatabb;

            }else{
                $this->etatabb = "<i class='fas fa-calendar-times bg-danger' style='font-size:26px'>fini</i>";
                return $this->etatabb;
            }

        
    }

    public function setStatus(): self
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

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(Paiement $paiement): self
    {
        $this->paiement = $paiement;

        // set the owning side of the relation if necessary
        if ($this !== $paiement->getAbonnement()) {
            $paiement->setAbonnement($this);
        }

        return $this;
    }

    public function getRemboursement(): ?bool
    {
        return $this->remboursement;
    }

    public function setRemboursement(bool $remboursement): self
    {
        $this->remboursement = $remboursement;

        return $this;
    }

    public function getDateremboursement(): ?\DateTimeInterface
    {
        return $this->dateremboursement;
    }

    public function setDateremboursement(?\DateTimeInterface $dateremboursement): self
    {
        $this->dateremboursement = $dateremboursement;

        return $this;
    }

    public function getEstpaye(): ?bool
    {
        return $this->estpaye;
    }

    public function setEstpaye(?bool $estpaye): self
    {
        $this->estpaye = $estpaye;

        return $this;
    }

    public function getEstprolonge(): ?bool
    {
        return $this->estprolonge;
    }

    public function setEstprolonge(?bool $estprolonge): self
    {
        $this->estprolonge = $estprolonge;

        return $this;
    }



   
}
