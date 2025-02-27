<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commande>
 *
 * @method Commande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commande[]    findAll()
 * @method Commande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /**
     * @return Commande[] Returns an array of Commande objects based on the client's ID
     */
    public function findByClient(int $clientId): array
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.client', 'cl')
            ->andWhere('cl.id = :clientId')
            ->setParameter('clientId', $clientId)
            ->orderBy('c.idCommande', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commande[] Returns an array of Commande objects based on the state of the order
     */
    public function findByEtatCommande(string $etatCommande): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.etatCommande = :etatCommande')
            ->setParameter('etatCommande', $etatCommande)
            ->orderBy('c.dateCommande', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commande[] Returns an array of Commande objects based on the payment method
     */
    public function findByModePaiement(string $modePaiement): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.modePaiement = :modePaiement')
            ->setParameter('modePaiement', $modePaiement)
            ->orderBy('c.dateCommande', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commande[] Returns an array of Commande objects within a date range
     */
    public function findByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.dateCommande BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->orderBy('c.dateCommande', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commande|null Returns a Commande object based on the client's ID and order state
     */
    public function findOneByClientAndEtatCommande(int $clientId, string $etatCommande): ?Commande
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.client', 'cl')
            ->andWhere('cl.id = :clientId')
            ->andWhere('c.etatCommande = :etatCommande')
            ->setParameter('clientId', $clientId)
            ->setParameter('etatCommande', $etatCommande)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Commande[] Returns an array of Commande objects ordered by delivery date
     */
    public function findAllOrderedByDeliveryDate(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.dateLivraison', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
