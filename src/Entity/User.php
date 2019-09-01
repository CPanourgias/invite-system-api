<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invite", mappedBy="sender", orphanRemoval=true)
     */
    private $invites_sent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invite", mappedBy="reciever")
     */
    private $invites_recieved;

    public function __construct()
    {
        $this->invites_sent = new ArrayCollection();
        $this->invites_recieved = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Invite[]
     */
    public function getInvitesSent(): Collection
    {
        return $this->invites_sent;
    }

    public function addInvitesSent(Invite $invitesSent): self
    {
        if (!$this->invites_sent->contains($invitesSent)) {
            $this->invites_sent[] = $invitesSent;
            $invitesSent->setSender($this);
        }

        return $this;
    }

    public function removeInvitesSent(Invite $invitesSent): self
    {
        if ($this->invites_sent->contains($invitesSent)) {
            $this->invites_sent->removeElement($invitesSent);
            // set the owning side to null (unless already changed)
            if ($invitesSent->getSender() === $this) {
                $invitesSent->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Invite[]
     */
    public function getInvitesRecieved(): Collection
    {
        return $this->invites_recieved;
    }

    public function addInvitesRecieved(Invite $invitesRecieved): self
    {
        if (!$this->invites_recieved->contains($invitesRecieved)) {
            $this->invites_recieved[] = $invitesRecieved;
            $invitesRecieved->setReciever($this);
        }

        return $this;
    }

    public function removeInvitesRecieved(Invite $invitesRecieved): self
    {
        if ($this->invites_recieved->contains($invitesRecieved)) {
            $this->invites_recieved->removeElement($invitesRecieved);
            // set the owning side to null (unless already changed)
            if ($invitesRecieved->getReciever() === $this) {
                $invitesRecieved->setReciever(null);
            }
        }

        return $this;
    }
}
