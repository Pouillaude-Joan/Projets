<?php

namespace App\Entity;

use App\Repository\ReplyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReplyRepository::class)
 */
class Reply
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $responseContent;

    /**
     * @ORM\Column(type="date")
     */
    private $responseDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $responseNotification;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="replies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $voters;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="replies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $identityUser;

    public function __construct()
    {
        $this->voters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResponseContent(): ?string
    {
        return $this->responseContent;
    }

    public function setResponseContent(string $responseContent): self
    {
        $this->responseContent = $responseContent;

        return $this;
    }

    public function getResponseDate(): ?\DateTimeInterface
    {
        return $this->responseDate;
    }

    public function setResponseDate(\DateTimeInterface $responseDate): self
    {
        $this->responseDate = $responseDate;

        return $this;
    }

    public function getResponseNotification(): ?bool
    {
        return $this->responseNotification;
    }

    public function setResponseNotification(?bool $responseNotification): self
    {
        $this->responseNotification = $responseNotification;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getVoters(): Collection
    {
        return $this->voters;
    }

    public function addVoter(User $voter): self
    {
        if (!$this->voters->contains($voter)) {
            $this->voters[] = $voter;
        }

        return $this;
    }

    public function removeVoter(User $voter): self
    {
        $this->voters->removeElement($voter);

        return $this;
    }

    public function getIdentityUser(): ?User
    {
        return $this->identityUser;
    }

    public function setIdentityUser(?User $identityUser): self
    {
        $this->identityUser = $identityUser;

        return $this;
    }
}
