<?php

require_once "../models/Document.php";
require_once "../services/ConnexionSingleton.php";

class DocumentDao{

    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion = null)
    {
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }



    public function getAllByIdAdoption(?int $idAdoption): ?array
    {
        $sql =  "select * from document as a where a.id_adoption=$idAdoption";
        $preparedQuery = $this->connexion->prepare($sql);
        $resultats = [];
        try {
            $preparedQuery->execute();

            while ($row = $preparedQuery->fetch()) {
                $resultats[] = new Document($row['id'], $row['nom'], $row['identite'], $row['url'], new Adoption($row['id_adoption']));
            }

            return $resultats;
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }
    



    function save(Document $newDocument): ?Document
    {
        //1er étape : récuperer un id à partir de la sequence seq_image
        $sql = "select nextval('seq_document') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];

        //2éme étape : mettre à jour le numero de l'animal dans l'objet service 
        $newDocument->setId($nextId);

        //3eme étape : persister l'objet animal en BDD
        $sql = 'INSERT INTO "document" (id, nom, identite, url, id_adoption) VALUES(:idParam,:nomParam, :identiteParam, :urlParam, :idAdoptionParam)';
        $preparedQuery = $this->connexion->prepare($sql);


        $preparedQuery->bindValue(':idParam', $newDocument->getId());
        $preparedQuery->bindValue(':identiteParam', $newDocument->getIdentite() ? "true" : "false");
        $preparedQuery->bindValue(':nomParam', $newDocument->getNom());
        $preparedQuery->bindValue(':urlParam', str_replace("\\", "/", $newDocument->getUrl()));
        $preparedQuery->bindValue(':idAdoptionParam', $newDocument->getAdoption()->getId());
        try {
            $preparedQuery->execute();
        } catch (PDOException $e) {
            return null;
        } catch (Exception $e) {
            return null;
        }


        return  $newDocument;
    }



    /**
     * Get the value of connexion
     */ 
    public function getConnexion() : ?PDO
    {
        return $this->connexion;
    }

    /**
     * Set the value of connexion
     *
     * @return  self
     */ 
    public function setConnexion(?PDO $connexion)
    {
        $this->connexion = $connexion;

        return $this;
    }
}
?>