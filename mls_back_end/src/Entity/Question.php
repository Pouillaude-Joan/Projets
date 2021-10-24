<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $questionContent;

    /**
     * @ORM\Column(type="date")
     */
    private $questionDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $resolved;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $identityUser;

    /**
     * @ORM\OneToMany(targetEntity=Reply::class, mappedBy="question", orphanRemoval=true)
     */
    private $replies;

    /**
     * @ORM\ManyToMany(targetEntity=SubDomain::class, inversedBy="questions")
     */
    private $subDomain;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
        $this->subDomain = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getQuestionContent(): ?string
    {
        return $this->questionContent;
    }

    public function setQuestionContent(string $questionContent): self
    {
        $this->questionContent = $questionContent;

        return $this;
    }

    public function getQuestionDate(): ?\DateTimeInterface
    {
        return $this->questionDate;
    }

    public function setQuestionDate(\DateTimeInterface $questionDate): self
    {
        $this->questionDate = $questionDate;

        return $this;
    }

    public function getResolved(): ?bool
    {
        return $this->resolved;
    }

    public function setResolved(bool $resolved): self
    {
        $this->resolved = $resolved;

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

    /**
     * @return Collection|Reply[]
     */
    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(Reply $reply): self
    {
        if (!$this->replies->contains($reply)) {
            $this->replies[] = $reply;
            $reply->setQuestion($this);
        }

        return $this;
    }

    public function removeReply(Reply $reply): self
    {
        if ($this->replies->removeElement($reply)) {
            // set the owning side to null (unless already changed)
            if ($reply->getQuestion() === $this) {
                $reply->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubDomain[]
     */
    public function getSubDomain(): Collection
    {
        return $this->subDomain;
    }

    public function addSubDomain(SubDomain $subDomain): self
    {
        if (!$this->subDomain->contains($subDomain)) {
            $this->subDomain[] = $subDomain;
        }

        return $this;
    }

    public function removeSubDomain(SubDomain $subDomain): self
    {
        $this->subDomain->removeElement($subDomain);

        return $this;
    }
}
