<?php
require_once "../services/ConnexionSingleton.php";
require_once "../models/Vaccin.php";

class VaccinDao
{
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
        $sql =  "select * from vaccin";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $vaccinEnCours = new Vaccin();
            $vaccinEnCours->setNom($row['nom']);
            $vaccinEnCours->setDateVaccin($row['date_debut']);
            $vaccinEnCours->setDateFin($row['date_fin']);
            
            $resultats[] = $vaccinEnCours;
        }
        return $resultats;
    }

    
    public function update(Vaccin $newVaccin) : ?Vaccin
    {
        $sql = "UPDATE vaccin 
                set id=:idVaccinParam,
                    nom=:nomParam, 
                    date_debut=:dateVaccinParam 
                    date_fin=:dateFinParam
                where id=:idVaccinParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $id = $newVaccin->getId();
        $nom = $newVaccin->getNom();
        $dateVaccin=$newVaccin->getDateVaccin();
        $dateFin=$newVaccin->getDateFin();

        $preparedQuery->bindParam(':idVaccinParam', $id);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':dateVaccinParam', $dateVaccin);
        $preparedQuery->bindParam(':dateFinParam', $dateFin);

        $preparedQuery->execute();

        return  $newVaccin;
    }


    public function getById(?int $id): ?Vaccin
    {
        $sql =  "select * from vaccin as v where v.id=:idVaccinParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindValue(':idVaccinParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row) {
            return null;
        }
        $vaccin = new Vaccin();
        
        $vaccin->setId($row['id']);
        $vaccin->setNom($row['nom']);

        $dateVaccin = null;
        if ($row['date_debut']!=null) {
            $dateVaccin = DateHelper::toDateTime($row['date_debut']);
        }
        $vaccin->setDateVaccin($dateVaccin);
       
        $dateFin = null;
        if ($row['date_fin']!=null) {
            $dateFin = DateHelper::toDateTime($row['date_fin']);
        }
        $vaccin->setDateFin($dateFin);

        return $vaccin;
    }


    public function deleteById(?int $id)
    {
        $sql =  "delete from vaccin as v where v.id=:idVaccinParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idVaccinParam', $id);
        $preparedQuery->execute();
    }


    function save(Vaccin $newVaccin) : ?Vaccin
    {
        //1er étape : récuperer un id à partir de la sequence seq_vaccin
        $sql = "select nextval('seq_vaccin') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];
    
        //2éme étape : mettre à jour le numero de vaccin dans l'objet vaccin
        $newVaccin->setId($nextId);
    
        //3eme étape : persister l'objet vaccin en BDD
        $sql = "INSERT INTO vaccin (id,nom,dateVaccin,dateFin) VALUES(:idParam,:nomParam, :dateVaccinParam, :dateFinParam)";
        $preparedQuery = $this->connexion->prepare($sql);
    
        $preparedQuery->bindValue(':idParam', $newVaccin->getid());
        $preparedQuery->bindValue(':nomParam', $newVaccin->getNom());
       
        //probleme date
        $dateVaccinStr = null;
        if ($newVaccin->getDateVaccin()!=null) {
            $dateVaccinStr = $newVaccin->getDateVaccin()->format(DateHelper::DATE_FORMAT);
        }
        $preparedQuery->bindValue(':dateVaccinParam', $dateVaccinStr);
        
        $dateFinStr = null;
        if ($newVaccin->getDateFin()!=null) {
            $dateFinStr = $newVaccin->getDateFin()->format(DateHelper::DATE_FORMAT);
        }
        $preparedQuery->bindValue(':dateFinParam', $dateFinStr);

        return  $newVaccin;
    }

    /**
     * Get the value of connexion
     *
     * @return  PDO
     */
    public function getConnexion() : PDO
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
    public function setConnexion(PDO $connexion) 
    {
        $this->connexion = $connexion;
    }
}

