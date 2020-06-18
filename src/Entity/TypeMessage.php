<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeMessageRepository")
 */
class TypeMessage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typemessage;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="typemessage")
     */
    private $messages;

    public function __construct()
    {
    
        $this->messages = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypemessage(): ?string
    {
        return $this->typemessage;
    }

    public function setTypemessage(string $typemessage): self
    {
        $this->typemessage = $typemessage;

        return $this;
    }

    public function __toString()
    {
        return $this->getTypemessage() ?: '';
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setTypemessage($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getTypemessage() === $this) {
                $message->setTypemessage(null);
            }
        }

        return $this;
    }

    
    
}
