<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(mercure=true)
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "user.email": "exact","typeprojet.nom": "exact", "projectadmin.email": "exact","adress.departement.nom":"partial"}) 
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
     * @ORM\Column(type="string", length=100,options={"default":"draft"})
     */
    private $place1;

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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Adress", inversedBy="projet")
     */
    private $adress;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $surface;

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


    public function getPlace1(): ?string
    {
        return $this->place1;
    }

    /**
     * @param string $place1
     *
     * @return Projet
     */
    public function setPlace1(string $place1): self
    {
        $this->place1 = $place1;
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

    public function getAdress(): ?Adress
    {
        return $this->adress;
    }

    public function setAdress(?Adress $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }
}
