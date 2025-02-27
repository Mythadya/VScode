<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 *
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * @return Produit[] Returns an array of active Produit objects
     */
    public function findActiveProducts(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.produitActif = :actif')
            ->setParameter('actif', true)
            ->orderBy('p.libelleCourt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Produit|null Returns a Produit object or null
     */
    public function findOneByLibelleCourt(string $libelleCourt): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.libelleCourt = :libelle')
            ->setParameter('libelle', $libelleCourt)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Produit[] Returns an array of Produit objects filtered by SousRubrique
     */
    public function findBySousRubrique(int $sousRubriqueId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.sousRubrique = :sousRubriqueId')
            ->setParameter('sousRubriqueId', $sousRubriqueId)
            ->orderBy('p.libelleCourt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Produit[] Returns an array of Produit objects filtered by Fournisseur
     */
    public function findByFournisseur(int $fournisseurId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.fournisseur = :fournisseurId')
            ->setParameter('fournisseurId', $fournisseurId)
            ->orderBy('p.libelleCourt', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
