<?php
require_once '../models/Image.php';
require_once '../service/ConnexionSingleton.php';

class ImageDao
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

    /*  

    public function update(Animal $newService) : ?Animal
    {
        $sql = "UPDATE serv 
                set noserv=:numeroServiceParam,
                    service=:nomParam, 
                    ville=:villeParam 
                where noserv = :numeroServiceParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $numeroService = $newService->getNumeroService();
        $nom = $newService->getNom();
        $ville = $newService->getVille();
        $preparedQuery->bindParam(':numeroServiceParam', $numeroService);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':villeParam', $ville);
        $preparedQuery->execute();

        return  $newService;
    }
*/
    public function getById(?int $id): ?Service
    {
        $sql =  "select * from image as a where a.id=$id";
        $preparedQuery = $this->connexion->prepare($sql);
        try {
            $preparedQuery->execute();
            $row = $preparedQuery->fetch();
            if (!$row)
                return null;

            return new image($row['id'], $row['nom'], $row['est_pricipale'], $row['url'], new Animal($row['animal_id']));
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }
    public function getAllByIdAnimal(?int $idAnimal): ?array
    {
        $sql =  "select * from image as a where a.animal_id=$idAnimal";
        $preparedQuery = $this->connexion->prepare($sql);
        $resultats = [];
        try {
            $preparedQuery->execute();

            while ($row = $preparedQuery->fetch()) {
                $resultats[] = new image($row['id'], $row['nom'], $row['est_principale'], $row['url'], new Animal($row['animal_id']));
            }

            return $resultats;
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }

    public function getAll(): ?array
    {
        $sql =  "select * from image as a";
        $preparedQuery = $this->connexion->prepare($sql);
        $resultats = [];
        try {
            $preparedQuery->execute();

            while ($row = $preparedQuery->fetch()) {
                $resultats[] = new image($row['id'], $row['nom'], $row['est_pricipale'], $row['url'], new Animal($row['animal_id']));
            }

            return $resultats;
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }
    /*
    public function deleteById(?int $numeroService) :void
    {
        $sql =  "delete from serv as e where e.noserv=:numeroServiceParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':numeroServiceParam', $numeroService);
        $preparedQuery->execute();
    }

*/
    function save(Image $newImage): ?Image
    {
        //1er étape : récuperer un id à partir de la sequence seq_image
        $sql = "select nextval('seq_image') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        var_dump($row);
        $nextId = $row['next_id'];

        //2éme étape : mettre à jour le numero de l'animal dans l'objet service 
        $newImage->setId($nextId);

        //3eme étape : persister l'objet animal en BDD
        $sql = 'INSERT INTO "image" (id, nom, est_principale, url, animal_id) VALUES(:idParam,:nomParam, :estPrincipaleParam, :urlParam, :idAnimalParam)';
        $preparedQuery = $this->connexion->prepare($sql);


        $preparedQuery->bindValue(':idParam', $newImage->getId());
        $preparedQuery->bindValue(':estPrincipaleParam', $newImage->getEstPrincipale() ? "true" : "false");
        $preparedQuery->bindValue(':nomParam', $newImage->getNom());
        $preparedQuery->bindValue(':urlParam', str_replace("\\", "/", $newImage->getUrl()));
        $preparedQuery->bindValue(':idAnimalParam', $newImage->getAnimal()->getId());
        try {
            $preparedQuery->execute();
        } catch (PDOException $e) {
            return null;
        } catch (Exception $e) {
            return null;
        }


        return  $newImage;
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
