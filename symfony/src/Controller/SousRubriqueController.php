<?php

namespace App\Controller;

use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SousRubriqueController extends AbstractController
{
    #[Route('/sous-rubriques', name: 'app_sous_rubrique')]
    public function index(SousRubriqueRepository $sousRubriqueRepository): Response
    {
        // Récupérer toutes les sous-rubriques
        $sousRubriques = $sousRubriqueRepository->findAllSousRubriques();

        return $this->render('sous_rubrique/sous_rubrique.html.twig', [
            'sousRubriques' => $sousRubriques,
        ]);
    }
}
