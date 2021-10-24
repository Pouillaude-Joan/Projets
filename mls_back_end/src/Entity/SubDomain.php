<?php

namespace App\Entity;

use App\Repository\SubDomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubDomainRepository::class)
 */
class SubDomain
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
    private $labelSubDomain;

    /**
     * @ORM\Column(type="text")
     */
    private $subDomainCodeReference;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, mappedBy="SubDomain")
     */
    private $questions;

    /**
     * @ORM\ManyToMany(targetEntity=Tutorial::class, mappedBy="SubDomain")
     */
    private $tutorials;


    /**
     * @ORM\ManyToMany(targetEntity=Domain::class, inversedBy="SubDomain")
     */
    private $Domains;

    public function __construct()
    {
        $this->tutorials = new ArrayCollection();
        $this->questions = new ArrayCollection();
        $this->Domains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelSubDomain(): ?string
    {
        return $this->labelSubDomain;
    }

    public function setLabelSubDomain(string $labelSubDomain): self
    {
        $this->labelSubDomain = $labelSubDomain;

        return $this;
    }

    public function getSubDomainCodeReference(): ?string
    {
        return $this->subDomainCodeReference;
    }

    public function setSubDomainCodeReference(string $subDomainCodeReference): self
    {
        $this->subDomainCodeReference = $subDomainCodeReference;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->addSubDomain($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            $question->removeSubDomain($this);
        }

        return $this;
    }

    /**
     * @return Collection|Tutorial[]
     */
    public function getTutorials(): Collection
    {
        return $this->tutorials;
    }

    public function addTutorial(Tutorial $tutorial): self
    {
        if (!$this->tutorials->contains($tutorial)) {
            $this->tutorials[] = $tutorial;
            $tutorial->addSubDomain($this);
        }

        return $this;
    }

    public function removeTutorial(Tutorial $tutorial): self
    {
        if ($this->tutorials->removeElement($tutorial)) {
            $tutorial->removeSubDomain($this);
        }

        return $this;
    }

    /**
     * @return Collection|Domain[]
     */
    public function getDomains(): Collection
    {
        return $this->Domains;
    }

    public function addDomain(Domain $domain): self
    {
        if (!$this->Domains->contains($domain)) {
            $this->Domains[] = $domain;
        }

        return $this;
    }

    public function removeDomain(Domain $domain): self
    {
        $this->Domains->removeElement($domain);

        return $this;
    }
}
