<?php

namespace App\Repository;

use App\Entity\Gere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gere>
 *
 * @method Gere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gere[]    findAll()
 * @method Gere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gere::class);
    }

    /**
     * @return Gere[] Returns an array of Gere objects for a specific client
     */
    public function findByClient(int $clientId): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Gere[] Returns an array of Gere objects for a specific commercial
     */
    public function findByCommercial(int $commercialId): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.commercial = :commercialId')
            ->setParameter('commercialId', $commercialId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifie si un client est géré par un commercial spécifique
     *
     * @return bool True si le client est géré par le commercial, sinon False
     */
    public function clientIsManagedByCommercial(int $clientId, int $commercialId): bool
    {
        return (bool) $this->createQueryBuilder('g')
            ->andWhere('g.client = :clientId')
            ->andWhere('g.commercial = :commercialId')
            ->setParameter('clientId', $clientId)
            ->setParameter('commercialId', $commercialId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère tous les commerciaux pour un client donné
     *
     * @return Commercial[] Liste des commerciaux qui gèrent un client
     */
    public function findCommercialsForClient(int $clientId): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.commercial')
            ->andWhere('g.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère tous les clients gérés par un commercial
     *
     * @return Client[] Liste des clients gérés par un commercial
     */
    public function findClientsForCommercial(int $commercialId): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.client')
            ->andWhere('g.commercial = :commercialId')
            ->setParameter('commercialId', $commercialId)
            ->getQuery()
            ->getResult();
    }
}
