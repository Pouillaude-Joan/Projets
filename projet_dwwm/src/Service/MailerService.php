<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private MailerInterface $mailerInterface;

public function __construct(MailerInterface $mailerInterface)
{
    $this->mailerInterface = $mailerInterface;
}
    public function sendEmailHtml(string $from, string $to, string $subject, string $html, ?string $cc=null, ?string $bcc=null, ?string $replyTo=null)
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->html($html);
            if ($cc != null)
            $email->cc($cc);
            if ($bcc != null)
            $email->bcc($bcc);
            if ($replyTo != null)
            $email->replyTo($replyTo);


        $this->mailerInterface->send($email);
    }

    public function sendEmailTxt(string $from, string $to, string $subject, string $text, ?string $cc=null, ?string $bcc=null, ?string $replyTo=null)
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text($text);
            if ($cc != null)
            $email->cc($cc);
            if ($bcc != null)
            $email->bcc($bcc);
            if ($replyTo != null)
            $email->replyTo($replyTo);
        

        $this->mailerInterface->send($email);
    }
}