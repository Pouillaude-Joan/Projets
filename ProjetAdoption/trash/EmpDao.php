<?php
require_once '../models/Emp.php';
require_once '../services/ConnexionSingleton.php';

class EmpDao
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

    public function showAllEmp()
    {
        $sql = "select noemp from emp;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $noemps = $preparedQuery->fetchAll();
        if (empty($noemps)) {
            echo ("<h1> Pas d'employés <h1>");
        } else {
            echo ("<form method='POST' action='./EmpModificationDisplayController.php'>
            <select name='Emp'>");
            foreach ($noemps as $noemp) {
                    foreach ($noemp as $no){
                    echo ("<option value='". $no ."'>".$no . "</option>");
                    }
            }
            echo ("</select>
            <input type='submit' name='submit' value='Choisir employé'>
            </form>");
        }
    }

    public function update(Emp $newEmp): Emp
    {
        $sql = "UPDATE emp 
                set noemp = :numeroEmpParam,
                    nom =:nomParam, 
                    prenom = :prenomParam,
                    emploi = :emploiParam,
                    sup = :supParam, 
                    embauche = :embaucheParam, 
                    sal = :salParam,
                    comm = :commParam, 
                    noserv = :noservParam 
                where noemp = :numeroEmpParam";
        $preparedQuery = $this->connexion->prepare($sql);

        $noemp = $newEmp->getNumeroEmp();
        $nom = $newEmp->getNom();
        $prenom = $newEmp->getPrenom();
        $emploi = $newEmp->getEmploi();
        $sup = $newEmp->getSup();
        $embauche = $newEmp->getEmbauche();
        $sal = $newEmp->getSal();
        $comm = $newEmp->getComm();
        $noserv = $newEmp->getNoserv();

        $preparedQuery->bindParam(':numeroEmpParam', $noemp);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':emploiParam', $emploi);
        $preparedQuery->bindParam(':supParam', $sup);
        $preparedQuery->bindParam(':embaucheParam', $embauche);
        $preparedQuery->bindParam(':salParam', $sal);
        $preparedQuery->bindParam(':commParam', $comm);
        $preparedQuery->bindParam(':noservParam', $noserv);
        $preparedQuery->execute();

        return  $newEmp;
    }

    public function getById(?int $numeroEmp): Emp
    {
        $sql =  "select * from emp as e where e.noemp=:numeroEmpParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':numeroEmpParam', $numeroEmp);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch(PDO::FETCH_ASSOC);

        $empEnCours = new Emp($row['noemp'], $row['nom'], $row['prenom'], $row['emploi'], $row['sup'], $row['embauche'], $row['sal'], $row['comm'], $row['noserv']);

        return $empEnCours;
    }

    public function getAll(): array
    {
        $sql =  "select * from emp as e";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $empEnCours = new Emp($row['noemp'], $row['nom'], $row['prenom'], $row['emploi'], $row['sup'], $row['embauche'], $row['sal'], $row['comm'], $row['noserv']);
            $empEnCours->setNom($row['nom']);
            $empEnCours->setPrenom($row['prenom']);
            $empEnCours->setEmploi($row['emploi']);
            $empEnCours->setSup($row['sup']);
            $empEnCours->setEmbauche($row['embauche']);
            $empEnCours->setSal($row['sal']);
            $empEnCours->setComm($row['comm']);
            $empEnCours->setNoserv($row['noserv']);
            $resultats[] = $empEnCours;
        }
        return $resultats;
    }

    public function deleteById(?int $numeroEmp)
    {
        $sql =  "delete from emp as e where e.noemp=:numeroEmpParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':numeroEmpParam', $numeroEmp);
        $preparedQuery->execute();
    }


    function save(Emp $newEmp): Emp
    {
        var_dump($newEmp);
        $sql = "select nextval('seq_emp') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];

        $newEmp->setNumeroEmp($nextId);

        $sql = "INSERT INTO emp (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv) 
        VALUES (:numeroEmpParam,:nomParam,:prenomParam,:emploiParam,:supParam, :embaucheParam, :salParam, :commParam, :noservParam)";
        $preparedQuery = $this->connexion->prepare($sql);

        $noemp = $newEmp->getNumeroEmp();
        $nom = $newEmp->getNom();
        $prenom = $newEmp->getPrenom();
        $emploi = $newEmp->getEmploi();
        $sup = $newEmp->getSup();
        $embauche = $newEmp->getEmbauche();
        $sal = $newEmp->getSal();
        $comm = $newEmp->getComm();
        $noserv = $newEmp->getNoserv();

        $preparedQuery->bindParam(':numeroEmpParam', $noemp);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':emploiParam', $emploi);
        $preparedQuery->bindParam(':supParam', $sup);
        $preparedQuery->bindParam(':embaucheParam', $embauche);
        $preparedQuery->bindParam(':salParam', $sal);
        $preparedQuery->bindParam(':commParam', $comm);
        $preparedQuery->bindParam(':noservParam', $noserv);
        $preparedQuery->execute();


        return $newEmp;
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
}
