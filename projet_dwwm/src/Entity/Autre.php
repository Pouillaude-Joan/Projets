<?php

namespace App\Entity;

use App\Repository\AutreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutreRepository::class)
 */
class Autre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rien;

    /**
     * @ORM\ManyToMany(targetEntity=Centre::class, mappedBy="autres")
     */
    private $centres;

    public function __construct()
    {
        $this->centres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRien(): ?string
    {
        return $this->rien;
    }

    public function setRien(?string $rien): self
    {
        $this->rien = $rien;

        return $this;
    }

    /**
     * @return Collection|Centre[]
     */
    public function getCentres(): Collection
    {
        return $this->centres;
    }

    public function addCentre(Centre $centre): self
    {
        if (!$this->centres->contains($centre)) {
            $this->centres[] = $centre;
            $centre->addAutre($this);
        }

        return $this;
    }

    public function removeCentre(Centre $centre): self
    {
        if ($this->centres->removeElement($centre)) {
            $centre->removeAutre($this);
        }

        return $this;
    }
}
