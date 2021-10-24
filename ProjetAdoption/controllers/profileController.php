<?php 
require_once '../dao/AdresseDao.php';
require_once '../models/Client.php';
require_once '../services/profileService.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

$clientDao = new ClientDao();
$adresseDao = new AdresseDao();
$client = $clientDao->getById($_SESSION['connectedUser']->getId());
$clientAdresse = $adresseDao->getAdresseById($_SESSION['connectedUser']->getId());

require '../views/profileView.php';
