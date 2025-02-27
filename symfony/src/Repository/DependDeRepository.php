<?php

namespace App\Repository;

use App\Entity\DependDe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DependDe>
 *
 * @method DependDe|null find($id, $lockMode = null, $lockVersion = null)
 * @method DependDe|null findOneBy(array $criteria, array $orderBy = null)
 * @method DependDe[]    findAll()
 * @method DependDe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DependDeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DependDe::class);
    }

    /**
     * @return DependDe[] Returns an array of DependDe objects based on the Rubrique
     */
    public function findByRubrique(Rubrique $rubrique): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.rubrique = :rubrique')
            ->setParameter('rubrique', $rubrique)
            ->orderBy('d.sousRubrique', 'ASC')  // you can change the sorting field if needed
            ->getQuery()
            ->getResult();
    }

    /**
     * @return DependDe[] Returns an array of DependDe objects based on the SousRubrique
     */
    public function findBySousRubrique(SousRubrique $sousRubrique): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.sousRubrique = :sousRubrique')
            ->setParameter('sousRubrique', $sousRubrique)
            ->orderBy('d.rubrique', 'ASC') // you can change the sorting field if needed
            ->getQuery()
            ->getResult();
    }

    /**
     * @return DependDe|null Returns a DependDe object based on the pair of Rubrique and SousRubrique
     */
    public function findOneByRubriqueAndSousRubrique(Rubrique $rubrique, SousRubrique $sousRubrique): ?DependDe
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.rubrique = :rubrique')
            ->andWhere('d.sousRubrique = :sousRubrique')
            ->setParameter('rubrique', $rubrique)
            ->setParameter('sousRubrique', $sousRubrique)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
