<?php
require_once '../models/Client.php';
require_once '../models/Adresse.php';
require_once '../services/ConnexionSingleton.php';
require_once '../exceptions/connexionException.php';

class ClientDao
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

    function save(Client $newUser, Adresse $newAdresse): Client
    {
        //Next user ID

        $sql = "select nextval('seq_utilisateur') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId1 = $row['next_id'];

        $newUser->setId($nextId1);

        //USER SQL

        $sql = "INSERT INTO utilisateur (id, nom, prenom, mail, tel, mot_de_passe) 
        VALUES (:idParam, :nomParam, :prenomParam, :mailParam, :telParam, md5(:mdpParam))";
        $preparedQuery = $this->connexion->prepare($sql);

        $nom = $newUser->getNom();
        $prenom = $newUser->getPrenom();
        $mail = $newUser->getMail();
        $tel = $newUser->getTel();
        $motDePasse = $newUser->getMotDePasse();

        $preparedQuery->bindParam(':idParam', $nextId1);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':mailParam', $mail);
        $preparedQuery->bindParam(':telParam', $tel);
        $preparedQuery->bindParam(':mdpParam', $motDePasse);
        $preparedQuery->execute();

        //Next Adresse ID

        $sql = "select nextval('seq_adresse') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId2 = $row['next_id'];

        $newAdresse->setId($nextId2);

        //ADRESS SQL

        $sql = "INSERT INTO adresse (id, rue, num, code_postal, ville, pays, id_utilisateur) 
        VALUES (:idParam, :rueParam, :numParam, :cpParam, :villeParam, :paysParam, :idUserParam)";
        $preparedQuery = $this->connexion->prepare($sql);

        $id = $newAdresse->getId();
        $rue = $newAdresse->getRue();
        $num = $newAdresse->getNum();
        $cp = $newAdresse->getCodePostal();
        $ville = $newAdresse->getVille();
        $pays = $newAdresse->getPays();
        $idUser = $newUser->getId();

        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->bindParam(':rueParam', $rue);
        $preparedQuery->bindParam(':numParam', $num);
        $preparedQuery->bindParam(':cpParam', $cp);
        $preparedQuery->bindParam(':villeParam', $ville);
        $preparedQuery->bindParam(':paysParam', $pays);
        $preparedQuery->bindParam(':idUserParam', $idUser);
        $preparedQuery->execute();

        //Client SQL
        $sql = "select nextval('seq_client') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId3 = $row['next_id'];

        $sql = "INSERT INTO client (id, id_utilisateur) 
        VALUES (:idParam, :idUserParam)";
        $preparedQuery = $this->connexion->prepare($sql);

        $idUser = $newUser->getId();

        $preparedQuery->bindParam(':idParam', $nextId3);
        $preparedQuery->bindParam(':idUserParam', $idUser);
        $preparedQuery->execute();

        //Return Full USER
        $newUser->setAdresse($newAdresse);

        return $newUser;
    }

    public function getByLoginPassword(?string $login, ?string $mdp): ?Client
    {
        $sql =  "SELECT * FROM utilisateur AS u WHERE u.mail=:loginParam AND u.mot_de_passe=md5(:mdpParam)";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindValue(':loginParam', $login);
        $preparedQuery->bindValue(':mdpParam', $mdp);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row)
            return null;
        $newUser = new Client();
        $newUser->setId($row['id']);
        $newUser->setNom($row['nom']);
        $newUser->setPrenom($row['prenom']);
        $newUser->setMail($login);
        $newUser->setTel($row['tel']);
        $newUser->setMotDePasse($mdp);
        $newUser->setAnciennete($row['date']);

        $id = $row['id'];

        $sql =  "SELECT * FROM adresse as a where a.id_utilisateur = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindValue(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();

        if (!$row)
            return null;
        $newAdresse = new Adresse();
        $newAdresse->setId($id);
        $newAdresse->setRue($row['rue']);
        $newAdresse->setNum($row['num']);
        $newAdresse->setCodePostal($row['code_postal']);
        $newAdresse->setVille($row['ville']);
        $newAdresse->setPays($row['pays']);
        $newUser->setAdresse($newAdresse);

        return $newUser;
    }

    public function modifyClient(?Client $client): Client
    {
        //USER
        $sql = "UPDATE utilisateur 
                set id = :idParam,
                    nom =:nomParam, 
                    prenom = :prenomParam,
                    mail = :mailParam,
                    tel = :telParam, 
                    mot_de_passe = md5(:mdpParam) 
                where id = :idParam";

        $preparedQuery = $this->connexion->prepare($sql);

        $idU = $client->getId();
        $nom = $client->getNom();
        $prenom = $client->getPrenom();
        $mail = $client->getMail();
        $tel = $client->getTel();
        $mot_de_passe = $client->getMotDePasse();

        $preparedQuery->bindParam(':idParam', $idU);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':mailParam', $mail);
        $preparedQuery->bindParam(':telParam', $tel);
        $preparedQuery->bindParam(':mdpParam', $mot_de_passe);
        $preparedQuery->execute();

        //ADRESSE
        $sql = "UPDATE adresse 
                set id = :idParam,
                    rue =:rueParam, 
                    num = :numParam,
                    code_postal = :cpParam,
                    ville = :villeParam, 
                    pays = :paysParam, 
                    id_utilisateur = :idUserParam
                where id = :idParam";

        $preparedQuery = $this->connexion->prepare($sql);

        $idA = $client->getAdresse()->getId();
        $rue = $client->getAdresse()->getRue();
        $num = $client->getAdresse()->getNum();
        $cp = $client->getAdresse()->getCodePostal();
        $ville = $client->getAdresse()->getVille();
        $pays = $client->getAdresse()->getPays();


        $preparedQuery->bindParam(':idParam', $idA);
        $preparedQuery->bindParam(':rueParam', $rue);
        $preparedQuery->bindParam(':numParam', $num);
        $preparedQuery->bindParam(':cpParam', $cp);
        $preparedQuery->bindParam(':villeParam', $ville);
        $preparedQuery->bindParam(':paysParam', $pays);
        $preparedQuery->bindParam(':idUserParam', $idA);
        $preparedQuery->execute();

        return $client;
    }

    public function getByid(?int $id): ?Client
    {
        $sql = "SELECT * FROM utilisateur as u WHERE u.id = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row)
            return null;
        $newUser = new Client();
        $newUser->setId($id);
        $newUser->setNom($row['nom']);
        $newUser->setPrenom($row['prenom']);
        $newUser->setMail($row['mail']);
        $newUser->setTel($row['tel']);
        $newUser->setMotDePasse($row['mot_de_passe']);
        $newUser->setAnciennete($row['date']);
        return $newUser;
    }

    public function getAll(): ?array
    {
        $sql =  "SELECT * FROM utilisateur as u, client as c where u.id = c.id_utilisateur";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $rows = $preparedQuery->fetchAll();

        if (!$rows)
            return null;

        foreach ($rows as $row) {
            $user = new Client();
            $user->setId($row['id_utilisateur']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setMail($row['mail']);
            $user->setTel($row['tel']);
            $user->setMotDePasse($row['mot_de_passe']);
            $user->setAnciennete($row['date']);
            $allUser[] = $user;
        }

        return $allUser;
    }

    public function delById(?int $id): void
    {
        $sql =  "DELETE FROM adresse WHERE id_utilisateur = :idGestParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idGestParam', $id);
        $preparedQuery->execute();

        $sql =  "DELETE FROM gestionnaire WHERE id_utilisateur = :idGestParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idGestParam', $id);
        $preparedQuery->execute();

        $sql =  "DELETE FROM utilisateur WHERE id = :idGestParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idGestParam', $id);
        $preparedQuery->execute();
    }

    /**
     * Get the value of connexion
     *
     * @return  PDO
     */
    public function getConnexion(): PDO
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

    public function getProfileType(?int $id): ?bool
    {
        $sql =  "SELECT * FROM client AS c WHERE c.id_utilisateur = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row) {
            return null;
        } else {
            return true;
        }
    }
}
