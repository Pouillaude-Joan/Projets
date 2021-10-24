

<?php
require_once '../models/Animal.php';
require_once '../dao/AnimalDao.php';

$animalDao = new AnimalDao();

$nom = $_POST['nom'];
$type = $_POST['type'];
$race = $_POST['race'];
$sexe = $_POST['sexe'];
$age = $_POST['age'];
$photo = $_POST['photo'];

$animalEnCours = new Animal(null, $nom, $type, $race, $sexe, $age, $photo);
$animalEnCours = $animalDao->save($animalEnCours);


// var_dump($animalEnCours);

header('Location: ./FaireDetailAnimalController.php?id='.$animalEnCours->getid());
    exit();
