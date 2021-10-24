<?php
require_once '../services/profileService.php';
require_once '../dao/GestionnaireDao.php';

$gestDao = new GestionnaireDao();
$id = $_GET['id'];

$gestDao->delById($id);

header ('Location: ./adminGestMenuController');
exit();