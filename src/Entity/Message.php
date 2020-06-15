<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;





    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="message")
     */
    private $projet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="destinatairemessages")
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="emeteurmesages")
     */
    private $emeteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeMessage", inversedBy="messages")
     */
    private $typemessage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sent;

    public function __construct()
    {
   
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        if($this->date){
           return $this->date;
        }else{
            return $this->date = new \DateTime('now');
        }
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getDestinataire(): ?User
    {
        return $this->destinataire;
    }

    public function setDestinataire(?User $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }
    public function __toString()
    {
        return "message" ?: '';
    }

    public function getEmeteur(): ?User
    {
        return $this->emeteur;
    }

    public function setEmeteur(?User $emeteur): self
    {
        $this->emeteur = $emeteur;

        return $this;
    }

    public function getTypemessage(): ?TypeMessage
    {
        return $this->typemessage;
    }

    public function setTypemessage(?TypeMessage $typemessage): self
    {
        $this->typemessage = $typemessage;

        return $this;
    }

    public function getSent(): ?bool
    {
        return $this->sent;
    }

    public function setSent(bool $sent): self
    {
        $this->sent = $sent;

        return $this;
    }
}
