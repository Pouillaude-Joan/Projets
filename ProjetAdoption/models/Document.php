<?php

class Document{

    private ?int $id;
    private ?string $nom;
    private ?bool $identite;
    private ?string $url;

    private ?Adoption $adoption;

    public function __construct(
        ?int $id = null,
        ?string $nom = null,
        ?bool $identite = null,
        ?string $url = null,
        ?Adoption $adoption = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->identite = $identite;
        $this->url = $url;
        $this->adoption = $adoption;
    }



    /**
     * Get the value of id
     */ 
    public function getId() : ?int
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
     * Get the value of nom
     */ 
    public function getNom() : ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom(?string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get the value of identite
     */ 
    public function getIdentite() : ?bool
    {
        return $this->identite;
    }

    /**
     * Set the value of identite
     *
     * @return  self
     */ 
    public function setIdentite(?bool $identite)
    {
        $this->identite = $identite;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl() : ?string
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the value of adoption
     */ 
    public function getAdoption() : ?Adoption
    {
        return $this->adoption;
    }

    /**
     * Set the value of adoption
     *
     * @return  self
     */ 
    public function setAdoption(?Adoption $adoption)
    {
        $this->adoption = $adoption;
    }
}
?>