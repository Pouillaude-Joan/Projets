<?php
require_once '../models/Service.php';
require_once '../models/Utilisateur.php';
require_once '../service/ConnexionSingleton.php';

class UtilisateurDao
{
    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion=null)
    {
        if($this->connexion==null){
            $this->connexion = ConnexionSingleton::getConnexion();
        }else{
            $this->connexion = $connexion;
        }

    }

    
    public function getByLoginPassword(?string $login,?string $password): ?Utilisateur
    {
        $sql =  "select * from utilisateur as e where e.email=:loginParam and e.mot_de_passe=md5(:mdpParam)";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindValue(':loginParam', $login);
        $preparedQuery->bindValue(':mdpParam', $password);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if(!$row)
            return null;
        $utilisateur = new Utilisateur();
        $utilisateur->setId($row['id']);
        $utilisateur->setNom($row['nom']);
        $utilisateur->setPrenom($row['prenom']);
        $utilisateur->setMail($row['email']);
        $utilisateur->setMotDePasse($password);
     
        return $utilisateur;
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
