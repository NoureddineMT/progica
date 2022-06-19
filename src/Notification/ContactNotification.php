<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactNotification {

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function contactNotify(Contact $contact){
        
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to($contact->getEmail())
            ->priority(Email::PRIORITY_HIGH)
            ->subject('Demande de contact')
            ->text('envoi de mail pour contact')
            ->htmlTemplate('notification/email.html.twig')
            ->context(["contact" => $contact]);

        $this->mailer->send($email);
    }
}

?>