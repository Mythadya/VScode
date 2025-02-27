<?php

namespace App\Repository;

use App\Entity\Contient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contient>
 *
 * @method Contient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contient[]    findAll()
 * @method Contient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contient::class);
    }

    /**
     * @return Contient[] Returns an array of Contient objects based on the Commande
     */
    public function findByCommande(Commande $commande): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.commande = :commande')
            ->setParameter('commande', $commande)
            ->orderBy('c.produit', 'ASC')  // Optional: you can change the sorting field
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Contient[] Returns an array of Contient objects based on the Produit
     */
    public function findByProduit(Produit $produit): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.produit = :produit')
            ->setParameter('produit', $produit)
            ->orderBy('c.commande', 'ASC')  // Optional: you can change the sorting field
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Contient|null Returns a Contient object based on a specific pair of Commande and Produit
     */
    public function findOneByCommandeAndProduit(Commande $commande, Produit $produit): ?Contient
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.commande = :commande')
            ->andWhere('c.produit = :produit')
            ->setParameter('commande', $commande)
            ->setParameter('produit', $produit)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Contient[] Returns all Contient objects with a quantity greater than a given value
     */
    public function findByMinimumQuantity(int $quantity): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.quantite > :quantity')
            ->setParameter('quantity', $quantity)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Contient[] Returns all Contient objects for a specific Commande ordered by quantity
     */
    public function findByCommandeOrderedByQuantity(Commande $commande): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.commande = :commande')
            ->setParameter('commande', $commande)
            ->orderBy('c.quantite', 'DESC') // Optional: you can adjust the order
            ->getQuery()
            ->getResult();
    }
}
