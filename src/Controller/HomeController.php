<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Service\EmailService;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $entityManager, EmailService $emailService)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailService->sendEmail($contact);

            // Enregistrez les données du formulaire dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Ajoutez un message flash de confirmation
            $this->addFlash('success', 'Le formulaire a été soumis avec succès.');

            // Redirigez vers une autre page, par exemple, la page d'accueil
            return $this->redirectToRoute('home');
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function mention_legal(Request $request, EntityManagerInterface $entityManager)
    {

        return $this->render(
            'mentions-legales.html.twig',
        );
    }

    #[Route('/politique-de-confidentialite', name: 'politique-de-confidentialite')]
    public function politique_de_confidentialite(Request $request, EntityManagerInterface $entityManager)
    {

        return $this->render(
            'politique-de-confidentialite.html.twig',
        );
    }
}
