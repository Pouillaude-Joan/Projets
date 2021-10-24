<?php
require_once '../models/Client.php';
require_once '../models/Adresse.php';
require_once '../dao/GestionnaireDao.php';
require_once '../services/profileService.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

$gestDao = new GestionnaireDao();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

$rue = $_POST['rue'];
$num = $_POST['num'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];

$newGest = new Client(null, $nom, $prenom, $tel, null, $mail, $mdp);
$newAdresse = new Adresse(null, $rue, $num, $cp, $ville, $pays, null);
$newGest = $gestDao->save($newGest, $newAdresse);

header('Location: ./adminGestMenuController.php');
exit();