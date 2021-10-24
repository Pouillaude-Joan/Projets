<?php

namespace App\Controller;

use App\Service\IVoitureService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\Voiture;
use Symfony\Component\HttpFoundation\Request;

class VoitureController extends AbstractController
{
    private IVoitureService $voitureService;

    public function __construct(IVoitureService $voitureService)
    {
        $this->voitureService = $voitureService;
    }

    /**
     * @Route("/voiture/all", name="voiture/all")
     */
    public function index(): Response
    {   
        $allVoiture = $this->voitureService->getAll();
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
            'allVoiture' => $allVoiture,
        ]);
    }

    /**
     * @Route("/voiture/{id<^\d+$>}", name="voiture/id", methods={"GET"})
     */
    public function indexById(int $id): Response
    {   
        $voiture = $this->voitureService->getAll($id);
        return $this->render('voiture/indexId.html.twig', [
            'controller_name' => 'VoitureController',
            'voiture' => $voiture,
        ]);
    }

    /**
     * @Route("/voiture/cree", methods={"POST"})
     */
    public function creeVoiture(Request $request){

        $id = $request->request->get('id');
        $marque = $request->request->get('marque');
        $model = $request->request->get('model');
        $this->voitureService->ajouterVoiture($id, $marque, $model);
        return $this->index();
    }
    /**
     * @Route("/voiture/ajouter", name = "voiture/ajouter")
     */
    public function ajouteForm(){
        return $this->render('voiture/indexAjout.html.twig');
    }
    /**
     * @Route("/voiture/supprimer/{id<^\d+$>}", name="voiture/id", methods={"GET"})
     */
    public function supprimerVoiture(int $id){
       
        $this->voitureService->supprimerVoiture($id);
        return $this->index();
    }

    /**
     * @Route("/voiture/modifier/{id<^\d+$>}", name="voiture/modifier/id", methods={"GET"})
     */
    public function modifForm(int $id){
        $voiture = $this->voitureService->getById($id);

        return $this->render('voiture/indexModif.html.twig',
        [
            'voiture' => $voiture,
        ]);
    }
    /**
     * @Route("/voiture/modifie", methods={"POST"})
     */
        public function modifierVoiture(Request $request){
        $id = $request->request->get('id');
        $marque = $request->request->get('marque');
        $model = $request->request->get('model');
        $this->voitureService->modifierVoiture($id, $marque, $model);
        return $this->indexById($id);
    }
}
