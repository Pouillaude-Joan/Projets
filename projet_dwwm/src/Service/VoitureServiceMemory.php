<?php

namespace App\Service;

use App\Entity\Voiture;

class VoitureServiceMemory /*implements IVoitureService*/
{
    private static ?array $voitures = null;

    public function __construct()
    {

        if (self::$voitures == null) {
            for ($i = 0; $i <= 6; $i++) {
                $allVoitures[] = new Voiture($i, "marque" . $i, "couleur" . $i);
            }

            self::$voitures = $allVoitures;
        }
    }

    public function getAll(): array
    {
        return self::$voitures;
    }

    public function getById($id): Voiture
    {
        foreach (self::$voitures as $voiture) {
            if ($voiture->getId() == $id) {
                return $voiture;
            }
        }
    }

    public function ajouterVoiture($id,$marque,$model){
        $voitures = self::$voitures;
        $voiture = new Voiture($id,$marque,$model);
        $voitures[] = $voiture;
        self::$voitures = $voitures; 
    }

    public function modifierVoiture($id,$marque,$model){
        foreach (self::$voitures as $index => $voiture) {
            if ($voiture->getId() == $id) {
                unset(self::$voitures[$index]);
                break;
            }
        }
        $this->ajouterVoiture($id,$marque,$model);
        return self::$voitures;

    }

    public function supprimerVoiture($id){
        foreach (self::$voitures as $index => $voiture) {
            if ($voiture->getId() == $id) {
                unset(self::$voitures[$index]);
                break;
            }
        }
        return self::$voitures;

    }
}
