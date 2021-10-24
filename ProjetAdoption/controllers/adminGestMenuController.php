<?php
require_once '../services/profileService.php';
require_once '../dao/GestionnaireDao.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

$gestDao = new GestionnaireDao();
$allGest = $gestDao->getAll();
$gestCnt = count($allGest);
$i = 0;

require '../views/adminGestMenuView.php';
