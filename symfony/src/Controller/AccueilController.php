<?php

// src/Controller/AccueilController.php

namespace App\Controller;

use App\Repository\RubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Route('/accueil/{libelle}', name: 'app_accueil')]
    public function index(RubriqueRepository $rubriqueRepository, string $libelle = ''): Response
    {
        // Utiliser le libellé dynamique pour filtrer
        $rubriques = $rubriqueRepository->findByLibelle($libelle); // Le libellé est passé en paramètre

        return $this->render('accueil/accueil.html.twig', [
            'rubriques' => $rubriques,
        ]);
    }
}
