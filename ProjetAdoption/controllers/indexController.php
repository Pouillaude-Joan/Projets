<?php

require_once '../services/profileService.php';
require_once '../models/Client.php';
require_once '../dao/AnimalDao.php';
require_once '../models/Animal.php';

session_start();

$animalDao= new AnimalDao();
$animals = $animalDao->getAll();
$chats = $animalDao->getAllChat();
$chiens = $animalDao->getAllChien();
shuffle($animals);

if (isset($_SESSION['connectedUser'])){
$profileService = new profileService();
$profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

require '../views/indexView.php';
exit();
