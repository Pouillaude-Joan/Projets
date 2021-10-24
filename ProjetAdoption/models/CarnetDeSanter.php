<?php
class CarnetDeSante
{
    private ?int $id;
    private ?Vaccin $vaccin;
    private ?Animal $animal;
 

    public function __construct(
    ?int $id = null,
    ?Vaccin $vaccin = null,
    ?Animal $animal = null)
    {

        $this->id = $id;
        $this->Vaccin = $vaccin;
        $this->Animal = $animal;
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
     * Get the value of vaccin
     */ 
    public function getVaccin(): ?Vaccin
    {
        return $this->vaccin;
    }

    /**
     * Set the value of vaccin
     *
     * @return  self
     */ 
    public function setVaccin(?Vaccin $vaccin)
    {
        $this->vaccin = $vaccin;

        return $this;
    }

    /**
     * Get the value of animal
     */ 
    public function getAnimal(): Animal
    {
        return $this->animal;
    }

    /**
     * Set the value of animal
     *
     * @return  self
     */ 
    public function setAnimal(?Animal $animal)
    {
        $this->animal = $animal;

        return $this;
    }
}

