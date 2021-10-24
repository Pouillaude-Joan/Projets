<?php
require_once '../services/profileService.php';
require_once '../dao/ClientDao.php';
require_once '../dao/AdresseDao.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

$id = $_GET['id'];
$clientDao = new ClientDao();
$adresseDao = new AdresseDao();

$user = new Client();
$user = $clientDao->getById($id);

$userAdresse = new Adresse();
$userAdresse = $adresseDao->getAdresseById($user->getId());

$user->setAdresse($userAdresse);

require '../views/adminModifyUserView.php';

?>