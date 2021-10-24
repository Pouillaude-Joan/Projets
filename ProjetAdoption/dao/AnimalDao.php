<?php

require_once '../services/ConnexionSingleton.php';
require_once '../models/Animal.php';

class AnimalDao{

    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion=null)
    {
        if($this->connexion==null){
            $this->connexion = ConnexionSingleton::getConnexion();
        }else{
            $this->connexion = $connexion;
        }

    }



    public function getAll(): array
    {
        $sql =  "select * from animal";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $animalEnCours = new Animal();
            $animalEnCours->setId($row['id']);
            $animalEnCours->setNom($row['nom']);
            $animalEnCours->setType($row['type']);
            $animalEnCours->setRace($row['race']);
            $animalEnCours->setSexe($row['sexe']);
            $animalEnCours->setAge($row['age']);
            $animalEnCours->setPhoto($row['photo']);
            $resultats[] = $animalEnCours;
        }
        return $resultats;
    }


    public function getAllChat(): array
    {
        $sql =  "select * from animal where type = 'chat'";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $animalEnCours = new Animal();
            $animalEnCours->setId($row['id']);
            $animalEnCours->setNom($row['nom']);
            $animalEnCours->setType($row['type']);
            $animalEnCours->setRace($row['race']);
            $animalEnCours->setSexe($row['sexe']);
            $animalEnCours->setAge($row['age']);
            $animalEnCours->setPhoto($row['photo']);
            $resultats[] = $animalEnCours;
        }
        return $resultats;
    }


    public function getAllChien(): array
    {
        $sql =  "select * from animal where type = 'chien'";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $animalEnCours = new Animal();
            $animalEnCours->setId($row['id']);
            $animalEnCours->setNom($row['nom']);
            $animalEnCours->setType($row['type']);
            $animalEnCours->setRace($row['race']);
            $animalEnCours->setSexe($row['sexe']);
            $animalEnCours->setAge($row['age']);
            $animalEnCours->setPhoto($row['photo']);
            $resultats[] = $animalEnCours;
        }
        return $resultats;
    }


    public function getById(?int $id): ?Animal
    {

        $sql =  "select * from animal where id=$id";
        $preparedQuery = $this->connexion->prepare($sql);
        try {
            $preparedQuery->execute();
            $row = $preparedQuery->fetch();
            if (!$row)
                return null;

            return new Animal($row['id'], $row['nom'], $row['type'], $row['race'], $row['sexe'], $row['age'], $row['photo']);
            
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }

    public function getByNom(?string $nom): ?AnimalDao
    {

        $sql =  "select * from animal as a where a.nom=$nom";
        $preparedQuery = $this->connexion->prepare($sql);
        try {
            $preparedQuery->execute();
            $row = $preparedQuery->fetch();
            if (!$row)
                return null;

            return new Animal($row['id'], $row['nom'], $row['type'], $row['race'], $row['sexe'], $row['age'], $row['photo']);
            
        } catch (Exception $e) {
            echo "erreur" . $e->getMessage();
            return null;
        }
    }

    function save(Animal $newAnimal): ?Animal
    {
        //1er étape : récuperer un id à partir de la sequence seq_animal
        $sql = "select nextval('seq_animal') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];

        //2éme étape : mettre à jour le numero de l'animal dans l'objet service 
        $newAnimal->setId($nextId);

        //3eme étape : persister l'objet animal en BDD
        $sql = "INSERT INTO public.animal (id, nom, sexe, race,\"type\"), age, photo VALUES(:idParam, :nomParam, :sexeParam, :raceParam, :typeParam, :ageParam, :photoParam)";
        $preparedQuery = $this->connexion->prepare($sql);


        $preparedQuery->bindValue(':idParam', $newAnimal->getId());
        $preparedQuery->bindValue(':nomParam', $newAnimal->getNom());
        $preparedQuery->bindValue(':sexeParam', $newAnimal->getSexe());
        $preparedQuery->bindValue(':raceParam', $newAnimal->getRace());
        $preparedQuery->bindValue(':typeParam', $newAnimal->getType());
        $preparedQuery->bindValue(':ageParam', $newAnimal->getAge());
        $preparedQuery->bindValue(':photoParam', $newAnimal->getPhoto());
        $preparedQuery->execute();

        return  $newAnimal;
    }


}

?>