<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
     * @ORM\OneToOne(targetEntity="App\Entity\Message", mappedBy="typemessage", cascade={"persist", "remove"})
     */
    private $message;

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

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): self
    {
        $this->message = $message;

        // set the owning side of the relation if necessary
        if ($this !== $message->getTypemessage()) {
            $message->setTypemessage($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getTypemessage() ?: '';
    }
}
