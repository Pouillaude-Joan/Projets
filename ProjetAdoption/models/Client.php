<?php

require_once 'Adresse.php';

class Client
{
    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?int $tel;
    private ?Adresse $adresse;
    private ?string $mail;
    private ?string $motDePasse;
    private ?string $anciennete;

    public function __construct(
        ?int $id = null,
        ?string $nom = null,
        ?string $prenom = null,
        ?int $tel = null,
        ?Adresse $adresse = null,
        ?string $mail = null,
        ?string $motDePasse = null,
        ?string $anciennete = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->adresse = $adresse;
        $this->mail = $mail;
        $this->motDePasse = $motDePasse;
        $this->anciennete = $anciennete;
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
     * Get the value of prenom
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom(?string $prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Get the value of tel
     */
    public function getTel(): ?int
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel(?int $tel)
    {
        $this->tel = $tel;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse(?Adresse $adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Get the value of mail
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail(?string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get the value of motDePasse
     */
    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */
    public function setMotDePasse(?string $motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * Get the value of motDePasse
     */
    public function getAnciennete(): ?string
    {
        return $this->anciennete;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */
    public function setAnciennete(?string $anciennete)
    {
        $this->anciennete = $anciennete;
    }
}
