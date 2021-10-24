<?php

require_once '../models/Client.php';
require_once '../models/Adresse.php';
require_once '../services/ConnexionSingleton.php';
require_once '../exceptions/connexionException.php';

class AdresseDao {
    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion = null)
    {
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }
    
    public function getAdresseById(?int $id): Adresse
    {
        
        $sql = "SELECT * FROM Adresse as a WHERE a.id_utilisateur = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row)
            return null;
        $clientAdresse = new Adresse();
        $clientAdresse->setId($id);
        $clientAdresse->setRue($row['rue']);      
        $clientAdresse->setNum($row['num']);
        $clientAdresse->setCodePostal($row['code_postal']);
        $clientAdresse->setVille($row['ville']);
        $clientAdresse->setPays($row['pays']);
        return $clientAdresse;
    }
}