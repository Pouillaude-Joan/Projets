<?php

require_once '../services/ConnexionService.php';
require_once '../helpers/ControllerHelper.php';

$controllerHelper = new ControllerHelper();
$login = ControllerHelper::getPostParam('login');
$mdp = ControllerHelper::getPostParam('mdp');

$connexionService = new ConnexionService();
$client = $connexionService->seConnecter($login,$mdp);

session_start();
$_SESSION['connectedUser'] = $client;

if (!isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] == null) {
    header('Location: ./connexionRegistrationController.php?failed=true');
    exit();
}

header('Location: ./indexController.php');
exit();