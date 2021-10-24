
<?php

require_once "../services/ConnexionSingleton.php";
require_once "../models/CarnetDeSante.php";

Class CarnetDeSante {

    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion=null)
    {
        if ($this->connexion==null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }


    public function getAll(): array
    {
        $sql =  "select * from carnet_de_sante ";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $carnetDeSanteEnCours = new CarnetDeSante();
            $vaccin= null;
            if($row['id']!=null)
            $vaccin = new Vaccin($row['id']);
            $carnetDeSanteEnCours->setVaccin($vaccin);

            $animal= null;
            if($row['id']!=null)
            $animal = new Animal($row['id']);
            $carnetDeSanteEnCours->setAnimal($animal);
            
            $resultats[] = $carnetDeSanteEnCours;
        }
        return $resultats;
    }



    public function getById(?int $id): ?CarnetDeSante
    {
        $sql =  "select * from carnet_de_sante as c where c.id=:idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindValue(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if(!$row)
            return null;
        $carnetDeSante = new CarnetDeSante();

        $carnetDeSante->setId($row['id']);

        $vaccin= null;
        if($row['id_vaccin']!=null)
        $vaccin = new Vaccin($row['id_vaccin']);
        $carnetDeSante->setVaccin($vaccin);

        $animal= null;
        if($row['id_animal']!=null)
        $animal = new Animal($row['id_animal']);
        $carnetDeSante->setAnimal($animal);
       
        return $carnetDeSante;
    }


    public function update(CarnetDeSante $newCarnetDeSante) : ?CarnetDeSante
    {
        $sql = "UPDATE carnet_de_sante
                set id=:idParam,
                id_vaccin=:vaccinParam, 
                id_animal=:animalParam 
                where  = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $id = $newCarnetDeSante->getId();
        $vaccin = $newCarnetDeSante->getVaccin();
        $animal = $newCarnetDeSante->getAnimal();
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->bindParam(':vaccinParam', $vaccin);
        $preparedQuery->bindParam(':animalParam', $animal);
        $preparedQuery->execute();

        return  $newCarnetDeSante;
    }


 function save(CarnetDeSante $newCarnetDeSante) : ?CarnetDeSante
    {
        //1er étape : récuperer un id à partir de la sequence seq_carnet_de_sante
        $sql = "select nextval('seq_carnet_de_sante') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];
    
        //2éme étape : mettre à jour le numero du carnetDeSante dans l'objet service
        $newCarnetDeSante->setId($nextId);
    
        //3eme étape : persister l'objet carnetDeSante  en BDD
        $sql = "INSERT INTO carnet_de_sante (id,id_vaccin, id_animal) VALUES(:idParam,:vaccinParam, :animalParam)";
        $preparedQuery = $this->connexion->prepare($sql);
    
        $vaccin = $newCarnetDeSante->getVaccin();
        $animal = $newCarnetDeSante->getAnimal();
        $preparedQuery->bindParam(':idParam', $nextId);
        $preparedQuery->bindParam(':vaccinParam', $vaccin);
        $preparedQuery->bindParam(':animalParam', $animal);
        $preparedQuery->execute();

        return  $newCarnetDeSante;
    }

    /**
     * Get the value of connexion
     *
     * @return  PDO
     */
    public function getConnexion() : ?PDO
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

   