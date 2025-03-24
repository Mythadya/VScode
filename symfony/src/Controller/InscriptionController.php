<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Définition du coefficient et du Ref_Client en fonction du type de client
            if ($client->getTypeClient() === 'particulier') {
                $client->setCoefficient(1.00);
                $client->setRefClient('C-1000' . rand(1000, 9999));
            } elseif ($client->getTypeClient() === 'professionnel') {
                $client->setCoefficient(1.80);
                $client->setRefClient('C-2000' . rand(1000, 9999));
            }

            // Récupération du mot de passe en clair depuis le formulaire
            $plainPassword = $form->get('Mots_De_Passe')->getData(); 
            
            if ($plainPassword) {
                // Hachage du mot de passe
                $hashedPassword = $passwordHasher->hashPassword($client, $plainPassword);
                $client->setPassword($hashedPassword);
            }

            // Sauvegarde en base de données
            $entityManager->persist($client);
            $entityManager->flush();

            // Rediriger vers la page de connexion après inscription
            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('connexion/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}