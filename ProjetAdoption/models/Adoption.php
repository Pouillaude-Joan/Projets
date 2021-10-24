<?php

class Adoption{

    private ?int $id;
    private ?int $idAnimal;
    private ?int $idUtilisateur;
    private ?array $documents;

    public function __construct(?int $id = null, ?int $idAnimal = null, ?int $idUtilisateur, ?array $documents = null){
        $this->id=$id;
        $this->idAnimal=$idAnimal;
        $this->idUtilisateur=$idUtilisateur;
        $this->documents=$documents;
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
     * Get the value of idAnimal
     */ 
    public function getIdAnimal() : ?int
    {
        return $this->idAnimal;
    }

    /**
     * Set the value of idAnimal
     *
     * @return  self
     */ 
    public function setIdAnimal(?int $idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur() : ?int
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur(?int $idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * Get the value of documents
     */ 
    public function getDocuments() : ?array
    {
        return $this->documents;
    }

    /**
     * Set the value of documents
     *
     * @return  self
     */ 
    public function setDocuments(?array $documents)
    {
        $this->documents = $documents;
    }

}











?>