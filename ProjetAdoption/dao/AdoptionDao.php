<?php

require_once "../models/Adoption.php";
require_once "../services/ConnexionSingleton.php";

class AdoptionDao
{
    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion = null)
    {
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }


    public function getById(?int $id): ?Adoption
    {

        $sql =  "select * from adoption as a where a.id=$id";
        $preparedQuery = $this->connexion->prepare($sql);
        try {
            $preparedQuery->execute();
            $row = $preparedQuery->fetch();
            if (!$row)
                return null;

            return new Adoption($row['id'], $row['idAnimal'], $row['idUtilisateur']);
            
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }



    function save(Adoption $newAdoption): ?Adoption
    {
        $sql = "select nextval('seq_adoption') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];    

        $newAdoption->setId($nextId);

        $sql = "INSERT INTO adoption (id, idAnimal, idUtilisateur) VALUES(:idParam, :idAnimalParam, :idUtilisateurParam)";
        $preparedQuery = $this->connexion->prepare($sql);


        $preparedQuery->bindValue(':idParam', $newAdoption->getId());
        $preparedQuery->bindValue(':idAnimal', $newAdoption->getIdAnimal());
        $preparedQuery->bindValue('idUtilisateur', $newAdoption->getIdUtilisateur());
        $preparedQuery->execute();

        return  $newAdoption;
    }
    /**
     * Get the value of connexion
     *
     * @return  PDO
     */
    public function getConnexion(): ?PDO
    {
        return $this->connexion;
    }

    /**
     * Set the value of connexion
     *
     * @param   PDO  $connexion  
     *
     * @return  self
     */
    public function setConnexion(?PDO $connexion)
    {
        $this->connexion = $connexion;
    }
}
?>