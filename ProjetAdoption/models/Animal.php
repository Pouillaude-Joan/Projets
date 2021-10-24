<?php


class Animal
{
    private ?int $id;
    private ?string $nom;
    private ?string $type;
    private ?string $race;
    private ?string $sexe;
    private ?int $age;
    private ?string $photo;

    public function __construct(?int $id = null, ?string $nom = null, ?string $type = null, ?string $race = null, ?string $sexe = null, ?int $age = null, ?string $photo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->race = $race;
        $this->sexe = $sexe;
        $this->age = $age;
        $this->photo = $photo;
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
     * Get the value of nom
     */
    public function getNom(): ?string
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
     * Get the value of type
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType(?string $type)
    {
        $this->type = $type;
    }

    /**
     * Get the value of race
     */
    public function getRace(): ?string
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */
    public function setRace(?string $race)
    {
        $this->race = $race;
    }

    /**
     * Get the value of sexe
     */
    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */
    public function setSexe(?string $sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * Get the value of age
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */
    public function setAge(?int $age)
    {
        $this->age = $age;
    }


    /**
     * Get the value of photo
     */ 
    public function getPhoto() : ?string
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto(?string $photo)
    {
        $this->photo = $photo;
    }
}
