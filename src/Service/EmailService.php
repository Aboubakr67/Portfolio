<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class EmailService
{
    private MailerInterface $mailer;
    private Environment $twig;

    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendEmail(Contact $contact)
    {
        // Rend le modèle Twig en HTML
        $htmlContent = $this->twig->render('contact_email.html.twig', [
            'name' => $contact->getName(),
            'subject' => $contact->getSubject(),
            'email' => $contact->getEmail(),
            'message' => $contact->getMessage(),
        ]);

        $email = (new Email())
            ->from(new Address('contact@aboubakr-zennir.fr'))
            ->replyTo(new Address($contact->getEmail()))
            ->to('contact@aboubakr-zennir.fr')
            ->subject($contact->getSubject())
            ->html($htmlContent); // Définissez le contenu HTML directement ici

        $this->mailer->send($email);
    }
}
