<?php

require_once '../dao/ClientDao.php';
require_once '../models/Client.php';
require_once '../models/Adresse.php';
require_once '../services/profileService.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}
$clientDao = new ClientDao();

$idU = $_SESSION['connectedUser']->getId();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

$idA = $_SESSION['connectedUser']->getAdresse()->getId();
$rue = $_POST['rue'];
$num = $_POST['num'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];

$clientAdresse = new Adresse($idA, $rue, $num, $cp, $ville, $pays);
$client = new Client($idU, $nom, $prenom, $tel, $clientAdresse, $mail, $mdp);

$moddedClient = $clientDao->modifyClient($client);
$_SESSION['connectedUser'] = $moddedClient;

require '../views/profileView.php';
