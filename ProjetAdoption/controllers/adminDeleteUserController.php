<?php
require_once '../services/profileService.php';
require_once '../dao/ClientDao.php';

$clientDao = new ClientDao();
$id = $_GET['id'];

$clientDao->delById($id);

header ('Location: ./adminUserMenuController');
exit();