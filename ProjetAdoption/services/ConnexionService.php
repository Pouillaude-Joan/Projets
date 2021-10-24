<?php
require_once '../dao/ClientDao.php';

class ConnexionService
{

    private ?ClientDao $ClientDao;


    public function __construct()
    {
        $this->ClientDao = new ClientDao();
    }

    public function seConnecter(?string $login, ?string $mdp): ?Client
    {

        $client = $this->ClientDao->getByLoginPassword($login, $mdp);

        return $client;
    }
}
