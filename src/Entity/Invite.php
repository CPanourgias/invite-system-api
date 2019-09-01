<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\InviteRepository")
 */
class Invite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="invites_sent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="invites_recieved")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reciever;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReciever(): ?User
    {
        return $this->reciever;
    }

    public function setReciever(?User $reciever): self
    {
        $this->reciever = $reciever;

        return $this;
    }
}
