<?php
require_once '../models/Admin.php';
require_once '../services/ConnexionSingleton.php';
require_once '../exceptions/connexionException.php';

class AdminDao
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

    public function getProfileType(?int $id): ?bool
    {
    $sql =  "SELECT * FROM admin AS a WHERE a.id = :idParam";
    $preparedQuery = $this->connexion->prepare($sql);
    $preparedQuery->bindParam(':idParam', $id);
    $preparedQuery->execute();
    $row = $preparedQuery->fetch();
    if (!$row)
        return null;
    else
        return true;
    }
}
