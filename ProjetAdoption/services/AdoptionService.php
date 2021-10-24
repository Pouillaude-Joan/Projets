<?php
require_once "../models/Adoption.php";
require_once "../dao/AdoptionDao.php";
require_once "../dao/DocumentDao.php";

class AdoptionService{

    private static string $UPLOADS_DIR = "../uploads";

    private ?AdoptionDao $adoptionDao;
    private ?DocumentDao $documentDao;

    public function __construct()
    {
        $this->adoptionDao = new AdoptionDao();
        $this->documentDao = new DocumentDao();
    }


    public function enregistrerAdoption(Adoption $newAdoption, array $documentsMultiPart): ?Adoption
    {
        $newAdoption =  $this->adoptionDao->save($newAdoption);

        $documents = [];

        foreach ($documentsMultiPart as $documentMultiPart) {
            $documents[] = $this->uploadFileAdoption(self::$UPLOADS_DIR, $newAdoption, $documentMultiPart, false);
        }
        foreach ($documents as $document) {
            $document = $this->documentDao->save($document);
        }

        $newAdoption->setDocuments($documents);

        return $newAdoption;
    }

    public function recupererAdoptionAvecDocumentsParId(?int $id) : ?Adoption
    {

        $adoption = $this->adoptionDao->getById($id);
        if($adoption !=null){
            $documents = $this->documentDao->getAllByIdAdoption($adoption->getId());
            $adoption->setDocuments($documents);
        }

        return $adoption;
    }


    private function uploadFileAdoption(String $uploaddir, adoption $adoption, array $multiPartFile, bool $identite): ?Document
    {
        if (!file_exists($uploaddir . "/" . $adoption->getId()))
            mkdir($uploaddir . "/"  . $adoption->getId());
        $uploadfile = $uploaddir . "/" . $adoption->getId() . "/" . basename($multiPartFile['name']);

        if (move_uploaded_file($multiPartFile['tmp_name'], $uploadfile)) {
            return new Document(null, $multiPartFile['name'], $identite, $uploadfile, $adoption);
        } else {
            throw new Exception("impossible de charger le fichier");
        }
    }





}
?>