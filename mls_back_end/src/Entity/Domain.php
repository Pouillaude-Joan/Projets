<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomainRepository::class)
 */
class Domain
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
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domainCodeReference;

    /**
     * @ORM\ManyToMany(targetEntity=SubDomain::class, mappedBy="Domains")
     */
    private $subdomains;

    public function __construct()
    {
        $this->subdomains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDomainCodeReference(): ?string
    {
        return $this->domainCodeReference;
    }

    public function setDomainCodeReference(string $domainCodeReference): self
    {
        $this->domainCodeReference = $domainCodeReference;

        return $this;
    }

    /**
     * @return Collection|SubDomain[]
     */
    public function getSubdomains(): Collection
    {
        return $this->subdomains;
    }

    public function addSubdomain(SubDomain $subdomain): self
    {
        if (!$this->subdomains->contains($subdomain)) {
            $this->subdomains[] = $subdomain;
            $subdomain->addDomain($this);
        }

        return $this;
    }

    public function removeSubdomain(SubDomain $subdomain): self
    {
        if ($this->subdomains->removeElement($subdomain)) {
            $subdomain->removeDomain($this);
        }

        return $this;
    }
}
