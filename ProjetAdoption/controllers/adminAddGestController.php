<?php

require_once '../services/profileService.php';
require_once '../dao/ClientDao.php';

session_start();

if (isset($_SESSION['connectedUser'])) {
    $profileService = new profileService();
    $profile = $profileService->getType($_SESSION['connectedUser']->getId());
}

require '../views/adminAddGestView.php';
