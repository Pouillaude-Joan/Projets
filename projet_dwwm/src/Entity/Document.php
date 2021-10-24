<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $numeroPlaque;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numeroVin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puissanceFiscale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puissanceMax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroPlaque(): ?string
    {
        return $this->numeroPlaque;
    }

    public function setNumeroPlaque(?string $numeroPlaque): self
    {
        $this->numeroPlaque = $numeroPlaque;

        return $this;
    }

    public function getNumeroVin(): ?string
    {
        return $this->numeroVin;
    }

    public function setNumeroVin(?string $numeroVin): self
    {
        $this->numeroVin = $numeroVin;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissanceFiscale;
    }

    public function setPuissanceFiscale(?int $puissanceFiscale): self
    {
        $this->puissanceFiscale = $puissanceFiscale;

        return $this;
    }

    public function getPuissanceMax(): ?int
    {
        return $this->puissanceMax;
    }

    public function setPuissanceMax(?int $puissanceMax): self
    {
        $this->puissanceMax = $puissanceMax;

        return $this;
    }
}
