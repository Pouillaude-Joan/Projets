<?php
require_once '../service/AdoptionService.php';
require_once "../helpers/ControllerHelper.php";

ControllerHelper::isConnected();
$idAdoption = ControllerHelper::getGetParam('id');
$adoptionService = new AdoptionService();

$adoption = $adoptionService->recupererAdoptionAvecDocumentsParId($idAdoption);


require "../views/DetailAdoptionView.php";
?>