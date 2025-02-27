<?php

// src/Controller/RubriqueController.php
namespace App\Controller;

use App\Repository\RubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RubriqueController extends AbstractController
{
    #[Route('/rubrique', name: 'app_rubrique')]
    public function index(RubriqueRepository $rubriqueRepository): Response
    {
        // Récupérer toutes les rubriques
        $rubriques = $rubriqueRepository->findAll();

        return $this->render('rubrique/rubrique.html.twig', [
            'rubriques' => $rubriques,
        ]);
    }
}
