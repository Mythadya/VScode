<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'panier_show')]
    public function showPanier(SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        return $this->render('panier/panier.html.twig', [
            'panier' => $panier,
        ]);
    }

    #[Route('/panier/ajouter/{id}', name: 'panier_add')]
    public function addToPanier(SessionInterface $session, $id)
    {
        $panier = $session->get('panier', []);
        if (!isset($panier[$id])) {
            $panier[$id] = 1;
        } else {
            $panier[$id]++;
        }
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier_show');
    }

    #[Route('/panier/supprimer/{id}', name: 'panier_remove')]
    public function removeFromPanier(SessionInterface $session, $id)
    {
        $panier = $session->get('panier', []);
        if (isset($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);

        return $this->redirectToRoute('panier_show');
    }
}
