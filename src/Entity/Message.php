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
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="messages")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TypeMessage", mappedBy="message")
     */
    private $typeMessages;

    public function __construct()
    {
        $this->client = new ArrayCollection();
        $this->typeMessages = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(User $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client[] = $client;
        }

        return $this;
    }

    public function removeClient(User $client): self
    {
        if ($this->client->contains($client)) {
            $this->client->removeElement($client);
        }

        return $this;
    }

    /**
     * @return Collection|TypeMessage[]
     */
    public function getTypeMessages(): Collection
    {
        return $this->typeMessages;
    }

    public function addTypeMessage(TypeMessage $typeMessage): self
    {
        if (!$this->typeMessages->contains($typeMessage)) {
            $this->typeMessages[] = $typeMessage;
            $typeMessage->addMessage($this);
        }

        return $this;
    }

    public function removeTypeMessage(TypeMessage $typeMessage): self
    {
        if ($this->typeMessages->contains($typeMessage)) {
            $this->typeMessages->removeElement($typeMessage);
            $typeMessage->removeMessage($this);
        }

        return $this;
    }
}
