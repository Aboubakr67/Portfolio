<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class EmailService
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendEmail(Contact $contact)
    {
        $email = (new Email())
            ->from(new Address('contact@aboubakr-zennir.fr'))
            ->replyTo(new Address($contact->getEmail()))
            ->to('contact@aboubakr-zennir.fr')
            ->subject($contact->getSubject())
            ->html($contact->getMessage());

        $this->mailer->send($email);
    }
}
