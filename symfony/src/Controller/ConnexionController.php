<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function connexion(): Response
    {
        return $this->render('connexion/connexion.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('connexion/inscription.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    #[Route('/changementmdp', name: 'app_changement_mdp')]
    public function changementMdp(): Response
    {
        return $this->render('connexion/changementmdp.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_connexion');
        }

        return $this->render('profil/profil.html.twig', [
            'user' => $user,
        ]);
    }
}
