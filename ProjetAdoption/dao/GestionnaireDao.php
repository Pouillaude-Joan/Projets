<?php
require_once '../models/Gestionnaire.php';
require_once '../models/Adresse.php';
require_once '../services/ConnexionSingleton.php';
require_once '../exceptions/connexionException.php';

class GestionnaireDao
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
        $sql =  "SELECT * FROM gestionnaire AS a WHERE a.id_utilisateur = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row)
            return null;
        else
            return true;
    }


    public function save(Client $newGest, Adresse $newAdresse): Client
    {
        //NEXT GEST ID

        $sql = "select nextval('seq_utilisateur') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId1 = $row['next_id'];

        $newGest->setId($nextId1);

        //USER SQL

        $sql = "INSERT INTO utilisateur (id, nom, prenom, mail, tel, mot_de_passe) 
        VALUES (:idParam, :nomParam, :prenomParam, :mailParam, :telParam, md5(:mdpParam))";
        $preparedQuery = $this->connexion->prepare($sql);

        $nom = $newGest->getNom();
        $prenom = $newGest->getPrenom();
        $mail = $newGest->getMail();
        $tel = $newGest->getTel();
        $motDePasse = $newGest->getMotDePasse();

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
        $idUser = $newGest->getId();

        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->bindParam(':rueParam', $rue);
        $preparedQuery->bindParam(':numParam', $num);
        $preparedQuery->bindParam(':cpParam', $cp);
        $preparedQuery->bindParam(':villeParam', $ville);
        $preparedQuery->bindParam(':paysParam', $pays);
        $preparedQuery->bindParam(':idUserParam', $idUser);
        $preparedQuery->execute();

        //Client SQL
        $sql = "select nextval('seq_gestionnaire') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId3 = $row['next_id'];

        $sql = "INSERT INTO gestionnaire (id, id_utilisateur) 
        VALUES (:idParam, :idGestParam)";
        $preparedQuery = $this->connexion->prepare($sql);

        $idUser = $newGest->getId();

        $preparedQuery->bindParam(':idParam', $nextId3);
        $preparedQuery->bindParam(':idGestParam', $idUser);
        $preparedQuery->execute();

        //Return Full USER
        $newGest->setAdresse($newAdresse);

        return $newGest;
    }

    public function getAll(): ?array
    {

        $sql =  "SELECT u.* FROM utilisateur AS u, gestionnaire as g WHERE u.id = g.id_utilisateur";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $rows = $preparedQuery->fetchAll();

        if (!$rows)
            return null;

        foreach ($rows as $row) {
            $user = new Client();
            $user->setId($row['id']);
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

    public function getByid(?int $id): ?Client
    {
        $sql = "SELECT * FROM utilisateur AS u WHERE u.id = :idParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':idParam', $id);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        if (!$row)
            return null;
        $currGest = new Client();
        $currGest->setId($id);
        $currGest->setNom($row['nom']);
        $currGest->setPrenom($row['prenom']);
        $currGest->setMail($row['mail']);
        $currGest->setTel($row['tel']);
        $currGest->setMotDePasse($row['mot_de_passe']);
        return $currGest;
    }

    public function modifyGestionnaire(?Client $client): Client
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
                    rue = :rueParam, 
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

}
