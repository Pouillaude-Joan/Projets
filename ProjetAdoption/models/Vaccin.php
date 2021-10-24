<?php

class Vaccin
{
    private ?int $id;
    private ?string $nom;
    private ?DateTime $dateVaccin;
    private ?DateTime $dateFin;
    

    public function __construct(
    ?int $id = null, 
    ?string $nom=null,
    ?DateTime $dateVaccin = null, 
    ?DateTime $dateFin = null)
    {

        $this->id = $id;
        $this->nom = $nom;
        $this->Datetime = $dateVaccin;
        $this->ADatetime = $dateFin;
    }

    
    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of dateVaccin
     */ 
    public function getDateVaccin(): ? DateTime
    {
        return $this->dateVaccin;
    }

    /**
     * Set the value of dateVaccin
     *
     * @return  self
     */ 
    public function setDateVaccin(?DateTime $dateVaccin)
    {
        $this->dateVaccin = $dateVaccin;

        return $this;
    }


    

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin(): ? DateTime
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin(?DateTime $dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }
}
