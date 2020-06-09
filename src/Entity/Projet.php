<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="adminprojs")
     */
    private $projectadmin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProjet", inversedBy="projets")
     */
    private $typeprojet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="projet")
     */
    private $message;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="projet")
     */
    private $documents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place")
     */
    private $place;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datedevis;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datefacture;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    public function __construct()
    {
        $this->message = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProjectadmin(): ?User
    {
        return $this->projectadmin;
    }

    public function setProjectadmin(?User $projectadmin): self
    {
        $this->projectadmin = $projectadmin;

        return $this;
    }

    public function getTypeprojet(): ?TypeProjet
    {
        return $this->typeprojet;
    }

    public function setTypeprojet(?TypeProjet $typeprojet): self
    {
        $this->typeprojet = $typeprojet;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
            $message->setProjet($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->contains($message)) {
            $this->message->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getProjet() === $this) {
                $message->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setProjet($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getProjet() === $this) {
                $document->setProjet(null);
            }
        }

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDatedevis(): ?\DateTimeInterface
    {
        return $this->datedevis;
    }

    public function setDatedevis(?\DateTimeInterface $datedevis): self
    {
        $this->datedevis = $datedevis;

        return $this;
    }

    public function getDatefacture(): ?\DateTimeInterface
    {
        return $this->datefacture;
    }

    public function setDatefacture(?\DateTimeInterface $datefacture): self
    {
        $this->datefacture = $datefacture;

        return $this;
    }
    public function __toString()
    {
        return $this->getNom() ?: '';
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
