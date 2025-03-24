<?php

// src/Repository/RubriqueRepository.php

namespace App\Repository;

use App\Entity\Rubrique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RubriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rubrique::class);
    }

    public function findByLibelle(string $libelle): array
    {
        return $this->createQueryBuilder('r')
         ->select('r.id, r.libelle') // On récupère aussi le libelle
         ->orderBy('r.id', 'ASC')
         ->getQuery()
         ->getResult();
    }
}
