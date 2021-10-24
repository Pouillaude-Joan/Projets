<?php
require_once '../dao/AdminDao.php';
require_once '../dao/ClientDao.php';
require_once '../dao/GestionnaireDao.php';
require_once '../services/ConnexionSingleton.php';

class profileService
{
    private ?ClientDao $clientDao;
    private ?AdminDao $adminDao;
    private ?GestionnaireDao $gestionnaireDao;

    public function __construct()
    {
        $this->clientDao = new ClientDao();
        $this->adminDao = new AdminDao();
        $this->gestionnaireDao = new GestionnaireDao();
    }

    public function getType(?int $id): ?array
    {
        if ($this->clientDao->getProfileType($id) == true){
            $profile[0] = 1;
        }else {
            $profile[0] = 0;
        }
        if ($this->adminDao->getProfileType($id) == true){
            $profile[1] = 1;
        }else {
            $profile[1] = 0;
        }
        if ($this->gestionnaireDao->getProfileType($id) == true){
            $profile[2] = 1;
        }else {
            $profile[2] = 0;
        }
        return $profile;
    }
}
