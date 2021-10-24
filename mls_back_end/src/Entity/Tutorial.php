<?php

namespace App\Entity;

use App\Repository\TutorialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TutorialRepository::class)
 */
class Tutorial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups("allTutorial")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups("allTutorial")
     */
    private $summary;

    /**
     * @ORM\Column(type="text")
     * @Groups("allTutorial")
     */
    private $tutorialContent;

    /**
     * @ORM\Column(type="date")
     * @Groups("allTutorial")
     */
    private $tutorialDate;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $voter;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $identityUser;

    /**
     * @ORM\ManyToMany(targetEntity=SubDomain::class, inversedBy="tutorials")
     */
    private $subDomain;


    public function __construct()
    {
        $this->voter = new ArrayCollection();
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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getTutorialContent(): ?string
    {
        return $this->tutorialContent;
    }

    public function setTutorialContent(string $tutorialContent): self
    {
        $this->tutorialContent = $tutorialContent;

        return $this;
    }

    public function getTutorialDate(): ?\DateTimeInterface
    {
        return $this->tutorialDate;
    }

    public function setTutorialDate(\DateTimeInterface $tutorialDate): self
    {
        $this->tutorialDate = $tutorialDate;

        return $this;
    }



    /**
     * @return Collection|User[]
     */
    public function getVoter(): Collection
    {
        return $this->voter;
    }

    public function addVoter(User $voter): self
    {
        if (!$this->voter->contains($voter)) {
            $this->voter[] = $voter;
        }

        return $this;
    }

    public function removeVoter(User $voter): self
    {
        $this->voter->removeElement($voter);

        return $this;
    }

    /**
     * @return Collection|SubDomain[]
     */
    public function getSubDomain(): Collection
    {
        return $this->subDomain;
    }

    public function addSubdomain(SubDomain $subDomain): self
    {
        if (!$this->subDomain->contains($subDomain)) {
            $this->subDomain[] = $subDomain;
        }

        return $this;
    }

    public function removeSubdomain(SubDomain $subDomain): self
    {
        $this->subDomain->removeElement($subDomain);

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
