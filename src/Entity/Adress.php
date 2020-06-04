<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $nrue;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nomrue;

    /**
     * @ORM\Column(type="integer")
     */
    private $codepostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="adress")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNrue(): ?int
    {
        return $this->nrue;
    }

    public function setNrue(int $nrue): self
    {
        $this->nrue = $nrue;

        return $this;
    }

    public function getNomrue(): ?string
    {
        return $this->nomrue;
    }

    public function setNomrue(string $nomrue): self
    {
        $this->nomrue = $nomrue;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
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
    public function __toString()
    {
        $retour =$this->getVille().' '.$this->getNrue().' '.$this->getNomrue().' '.$this->getCodepostal();
        return $retour ?: '';
    }
}
