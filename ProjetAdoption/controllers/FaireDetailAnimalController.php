<?php
require_once '../services/profileService.php';
require_once '../helpers/ControllerHelper.php';
require_once '../dao/AnimalDao.php';
require_once '../models/Animal.php';
session_start();
if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}
$animalDao = new AnimalDao();
$id = intval(ControllerHelper::getPostParam('id'));
$animalEnCours = $animalDao->getById($id);
require_once '../views/AfficherDetailAnimalView.php';
?>