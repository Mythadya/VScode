<?php

namespace App\Repository;

use App\Entity\SousRubrique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SousRubriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousRubrique::class);
    }

    // Méthode pour obtenir toutes les sous-rubriques
    public function findAllSousRubriques(): array
    {
        return $this->createQueryBuilder('sr')
            ->orderBy('sr.libelle', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

