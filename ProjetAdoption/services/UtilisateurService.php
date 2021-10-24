<?php
require_once '../dao/ClientDao.php';
require_once '../exceptions/connexionException.php';
require_once '../exceptions/EmployeInexistantException.php';
class EmployeService
{

    private ?ClientDao $serviceDao;


    public function __construct()
    {
        $this->serviceDao = new ClientDao();
    }

    public function enregistrerEmploye(?Client $newClient)
    {

        if ($newClient->getUtilisateur() != null) {
            $service = $this->serviceDao->getById($newClient->getUtilisateur());
            if ($service == null) {
                throw new ConnexionException("Le service n'existe pas");
            }
        }
        return $this->employeDao->save($newClient);
    }

    // public function connexionUser(?Client $newClient)
    // {

    //     if ($newClient->getService() != null) {
    //         $service = $this->serviceDao->getById($newClient->getService()->getNumeroService());
    //         if ($service == null) {
    //             throw new ServiceInexistantException("Le service n'existe pas");
    //         }
    //     }
    //     return $this->employeDao->save($newClient);
    // }
}
