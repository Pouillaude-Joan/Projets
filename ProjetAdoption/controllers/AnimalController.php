<?php 
require_once '../dao/AnimalDao.php';

$animalDao= new AnimalDao();
$animals = $animalDao->getAll();
$chats = $animalDao->getAllChat();
$chiens = $animalDao->getAllChien();
?>