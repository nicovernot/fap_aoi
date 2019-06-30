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
     * @ORM\ManyToMany(targetEntity="App\Entity\Message", inversedBy="typeMessages")
     */
    private $message;

    public function __construct()
    {
        $this->message = new ArrayCollection();
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
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->contains($message)) {
            $this->message->removeElement($message);
        }

        return $this;
    }
}
