<?php

require_once '../helpers/ControllerHelper.php';
require_once '../services/AdoptionService.php';


$adoptionService = new AdoptionService();

$idAnimal = intval(ControllerHelper::getPostParam('idAnimal'));
$idUtilisateur = intval(ControllerHelper::getPostParam('idUtilisateur'));

$newAdoption = new Adoption(null,$idAnimal,$idUtilisateur,[]);

$newAdoption = $adoptionService->enregistrerAdoption($newAdoption,$_FILES);

header('Location: ./DetailAdoptionController.php?id=');
exit();

?>