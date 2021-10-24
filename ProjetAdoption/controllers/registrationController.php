<?php
require_once '../models/Client.php';
require_once '../models/Adresse.php';
require_once '../dao/ClientDao.php';
$clientDao = new ClientDao();

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

$newClient = new Client(null, $nom, $prenom, $tel, null, $mail, $mdp);
$newAdresse = new Adresse(null, $rue, $num, $cp, $ville, $pays, null);
$newClient = $clientDao->save($newClient, $newAdresse);

header('Location: ./connexionRegistrationController.php');
exit();
