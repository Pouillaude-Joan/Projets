<?php

namespace App\Service;

use App\Entity\Voiture;

interface IVoitureService
{

    public function getAll(): array;

    public function getById($id): Voiture;

    public function ajouterVoiture($id,$marque,$model);

    public function modifierVoiture($id,$marque,$model);

    public function supprimerVoiture($id);
}
