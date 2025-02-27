<?php

namespace App\Repository;

use App\Entity\ClasseDans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClasseDans>
 *
 * @method ClasseDans|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClasseDans|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClasseDans[]    findAll()
 * @method ClasseDans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClasseDansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClasseDans::class);
    }

    /**
     * @return ClasseDans[] Returns an array of ClasseDans objects based on the product
     */
    public function findByProduit($produit): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.produit = :produit')
            ->setParameter('produit', $produit)
            ->orderBy('c.produit', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return ClasseDans[] Returns an array of ClasseDans objects based on the subcategory (SousRubrique)
     */
    public function findBySousRubrique($sousRubrique): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.sousRubrique = :sousRubrique')
            ->setParameter('sousRubrique', $sousRubrique)
            ->orderBy('c.sousRubrique', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return ClasseDans|null Returns a ClasseDans object based on both the product and subcategory
     */
    public function findOneByProduitAndSousRubrique($produit, $sousRubrique): ?ClasseDans
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.produit = :produit')
            ->andWhere('c.sousRubrique = :sousRubrique')
            ->setParameter('produit', $produit)
            ->setParameter('sousRubrique', $sousRubrique)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
