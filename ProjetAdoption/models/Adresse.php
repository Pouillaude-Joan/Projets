<?php

class Adresse
{

    private ?int $id;
    private ?string $rue;
    private ?int $num;
    private ?int $codePostal;
    private ?string $ville;
    private ?string $pays;

    public function __construct
    (
        ?int $id = null,
        ?string $rue = null,
        ?int $num = null,
        ?int $codePostal = null,
        ?string $ville = null,
        ?string $pays = null 
    )
    {
        $this->id = $id;
        $this->rue = $rue;
        $this->num = $num;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->pays = $pays;
    }


    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of rue
     */ 
    public function getRue(): ?string
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */ 
    public function setRue(?string $rue)
    {
        $this->rue = $rue;
    }

    /**
     * Get the value of num
     */ 
    public function getNum(): ?int
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum(?int $num)
    {
        $this->num = $num;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal(?int $codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille(?string $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of pays
     */ 
    public function getPays(): ?string
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     *
     * @return  self
     */ 
    public function setPays(?string $pays)
    {
        $this->pays = $pays;
    }
}
