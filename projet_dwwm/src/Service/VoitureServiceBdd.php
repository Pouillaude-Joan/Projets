<?php

namespace App\Service;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;

class VoitureServiceBdd implements IVoitureService
{
    private VoitureRepository $voitureRepository;

    public function __construct(VoitureRepository $voitureRepository)
    {
        $this->voitureRepository=$voitureRepository;
    }

    public function getAll(): array
    {
        return $this->voitureRepository->findAll();
    }

    public function getById($id): Voiture
    {
        return $this->voitureRepository->find($id);
    }

    public function ajouterVoiture($id,$marque,$model){
    
    }

    public function modifierVoiture($id,$marque,$model){
        
    }

    public function supprimerVoiture($id){
    
    }
}
