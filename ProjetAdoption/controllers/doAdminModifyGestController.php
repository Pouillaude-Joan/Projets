<?php
require_once '../dao/GestionnaireDao.php';
require_once '../models/Adresse.php';

$gestDao = new GestionnaireDao();

$idU = $_POST['idU'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

$idA = $_POST['idU'];
$rue = $_POST['rue'];
$num = $_POST['num'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];

$newAdresse = new Adresse($idA, $rue, $num, $cp, $ville, $pays);
$newGest = new Client($idU, $nom, $prenom, $tel, $newAdresse, $mail, $mdp);

$gestDao->modifyGestionnaire($newGest);

header ('location: ./adminGestMenuController.php');
exit();
