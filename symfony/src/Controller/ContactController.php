<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer, LoggerInterface $logger)
    {
        // Création du formulaire
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire
            $data = $form->getData();

            // Vérification des données récupérées
            $logger->info('Données du formulaire : ', $data);

            // Créer l'email
            $email = (new Email())
                ->from($data['email'])
                ->to('test@mailhog.local') // Modifié pour Mailhog
                ->subject('Nouveau message de contact')
                ->text($data['message']);

            try {
                // Envoi de l'email
                $mailer->send($email);
                $logger->info('Email envoyé avec succès.');

                // Message de confirmation
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
            } catch (\Exception $e) {
                // Log en cas d'erreur
                $logger->error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
                $this->addFlash('error', 'Erreur lors de l\'envoi de l\'email.');
            }

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
