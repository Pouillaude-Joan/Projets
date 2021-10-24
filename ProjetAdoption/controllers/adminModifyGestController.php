<?php
require_once '../services/profileService.php';
require_once '../dao/GestionnaireDao.php';
require_once '../dao/AdresseDao.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

$id = $_GET['id'];
$gestDao = new GestionnaireDao();
$adresseDao = new AdresseDao();

$currGest = $gestDao->getById($id);
$gestAdresse = $adresseDao->getAdresseById($currGest->getId());

$currGest->setAdresse($gestAdresse);

require '../views/adminModifyGestView.php';

?>