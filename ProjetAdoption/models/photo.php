<?php


class Photo
{

    private ?int $id;
    private ?string $nom;
    private ?bool $estPrincipale;
    private ?string $url;
    //oneToMany
    private ?Animal $animal;

    public function __construct(
        ?int $id = null,
        ?string $nom = null,
        ?string $url = null,
        ?Animal $animal = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->url = $url;
        $this->animal = $animal;
    }

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param   int  $id  
     *
     * @return  self
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nom
     *
     * @return  string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param   string  $nom  
     *
     * @return  self
     */
    public function setNom(?string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get the value of url
     *
     * @return  string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @param   string  $url  
     *
     * @return  self
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

    /**
     * Get the value of animal
     *
     * @return  Animal
     */
    public function getAnimal() : ?Animal
    {
        return $this->animal;
    }

    /**
     * Set the value of animal
     *
     * @param   Animal  $animal  
     *
     * @return  self
     */
    public function setAnimal(?Animal $animal) 
    {
        $this->animal = $animal;
    }
}
