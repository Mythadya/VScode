<?php

namespace App\Repository;

use App\Entity\Passe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Passe>
 *
 * @method Passe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Passe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Passe[]    findAll()
 * @method Passe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Passe::class);
    }

    /**
     * @return Passe[] Returns an array of Passe objects for a specific client
     */
    public function findByClient(int $clientId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Passe[] Returns an array of Passe objects for a specific commande
     */
    public function findByCommande(int $commandeId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifie si un client a déjà passé une commande spécifique
     *
     * @return bool True si le client a passé cette commande, sinon False
     */
    public function clientHasCommande(int $clientId, int $commandeId): bool
    {
        return (bool) $this->createQueryBuilder('p')
            ->andWhere('p.client = :clientId')
            ->andWhere('p.commande = :commandeId')
            ->setParameter('clientId', $clientId)
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère le nombre total de commandes passées par un client
     *
     * @return int Nombre de commandes passées
     */
    public function countCommandesByClient(int $clientId): int
    {
        return (int) $this->createQueryBuilder('p')
            ->select('COUNT(p.commande)')
            ->andWhere('p.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Récupère les derniers clients ayant passé une commande
     *
     * @param int $limit Nombre de résultats à récupérer
     * @return Passe[] Liste des commandes passées récemment
     */
    public function findLatestClients(int $limit = 10): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.commande', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
