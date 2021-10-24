<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    private  MailerService $MailerService ;

    public function __construct(MailerService $MailerService)
    {
        $this->MailerService = $MailerService;
    }

    /**
     * @Route("/personne", name="personne")
     */
    public function index(): Response
    {
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
        ]);
    }

    /**
     * @Route("/personne/sendMail", name="personne/sendMail")
     */
    public function sendMailHtml()
    {
        $this->MailerService->sendEmailHtml('test@gmail.com', 'test2@gmail.com', 'coucou', 'coucou');
        return $this->index();
    }
}
