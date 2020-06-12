<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\Criteria;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Secured resource.
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @ORM\Table(name="`user1`")
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * } )
 * 
 * @ApiFilter(SearchFilter::class, properties={"client": "exact","id":"exact"}) 
 */
class User implements UserInterface
{

    private $tokenStorage;

    /**
     * @var integer
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    

    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=180, unique=true)
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $tel;

    /**
     * @ORM\Column(type="datetime",name="datenaissance")
     * @Groups({"read", "write"})
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255,name="lieunaissance")
     * @Groups({"read", "write"})
     */
    private $lieuNaissance;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Appli", inversedBy="client")
     */
    private $appli;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adress", mappedBy="user")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apitoken;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="user")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="user")
     */
    private $projets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="projectadmin")
     */
    private $adminprojs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="destinataire")
     */
    private $destinatairemessages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="emeteur")
     */
    private $emeteurmesages;


   

    public function __construct()
    {
       
        $this->adress = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->projets = new ArrayCollection();
        $this->adminprojs = new ArrayCollection();
        $this->destinatairemessages = new ArrayCollection();
        $this->emeteurmesages = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }



    
    public function __toString()
    {
        return $this->getEmail() ?: '';
    }

  

    public function getAppli(): ?Appli
    {
        return $this->appli;
    }

    public function setAppli(?Appli $appli): self
    {
        $this->appli = $appli;

        return $this;
    }

    /**
     * @return Collection|Adress[]
     */
    public function getAdress(): Collection
    {
        return $this->adress;
    }

    public function addAdress(Adress $adress): self
    {
        if (!$this->adress->contains($adress)) {
            $this->adress[] = $adress;
            $adress->setUser($this);
        }

        return $this;
    }

    public function removeAdress(Adress $adress): self
    {
        if ($this->adress->contains($adress)) {
            $this->adress->removeElement($adress);
            // set the owning side to null (unless already changed)
            if ($adress->getUser() === $this) {
                $adress->setUser(null);
            }
        }

        return $this;
    }

    public function getApitoken(): ?string
    {
        return $this->apitoken;
    }

    public function setApitoken(?string $apitoken): self
    {
        $this->apitoken = $apitoken;

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
            $document->setUser($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getUser() === $this) {
                $document->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setUser($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getUser() === $this) {
                $projet->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getAdminprojs(): Collection
    {
        return $this->adminprojs;
    }

    public function addAdminproj(Projet $adminproj): self
    {
        if (!$this->adminprojs->contains($adminproj)) {
            $this->adminprojs[] = $adminproj;
            $adminproj->setProjectadmin($this);
        }

        return $this;
    }

    public function removeAdminproj(Projet $adminproj): self
    {
        if ($this->adminprojs->contains($adminproj)) {
            $this->adminprojs->removeElement($adminproj);
            // set the owning side to null (unless already changed)
            if ($adminproj->getProjectadmin() === $this) {
                $adminproj->setProjectadmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getDestinatairemessages(): Collection
    {
        return $this->destinatairemessages;
    }

    public function addDestinatairemessage(Message $destinatairemessage): self
    {
        if (!$this->destinatairemessages->contains($destinatairemessage)) {
            $this->destinatairemessages[] = $destinatairemessage;
            $destinatairemessage->setDestinataire($this);
        }

        return $this;
    }

    public function removeDestinatairemessage(Message $destinatairemessage): self
    {
        if ($this->destinatairemessages->contains($destinatairemessage)) {
            $this->destinatairemessages->removeElement($destinatairemessage);
            // set the owning side to null (unless already changed)
            if ($destinatairemessage->getDestinataire() === $this) {
                $destinatairemessage->setDestinataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getEmeteurmesages(): Collection
    {
        return $this->emeteurmesages;
    }

    public function addEmeteurmesage(Message $emeteurmesage): self
    {
        if (!$this->emeteurmesages->contains($emeteurmesage)) {
            $this->emeteurmesages[] = $emeteurmesage;
            $emeteurmesage->setEmeteur($this);
        }

        return $this;
    }

    public function removeEmeteurmesage(Message $emeteurmesage): self
    {
        if ($this->emeteurmesages->contains($emeteurmesage)) {
            $this->emeteurmesages->removeElement($emeteurmesage);
            // set the owning side to null (unless already changed)
            if ($emeteurmesage->getEmeteur() === $this) {
                $emeteurmesage->setEmeteur(null);
            }
        }

        return $this;
    }

   
    
}
