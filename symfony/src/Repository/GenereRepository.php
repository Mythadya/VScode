<?php

namespace App\Repository;

use App\Entity\Genere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Genere>
 *
 * @method Genere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genere[]    findAll()
 * @method Genere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genere::class);
    }

    /**
     * @return Genere[] Returns an array of Genere objects for a specific commande
     */
    public function findByCommande(int $commandeId): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Genere[] Returns an array of Genere objects for a specific document
     */
    public function findByDocument(int $documentId): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.document = :documentId')
            ->setParameter('documentId', $documentId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifie si une commande est liée à un document spécifique
     *
     * @return bool True si la commande est liée au document, sinon False
     */
    public function commandeIsLinkedToDocument(int $commandeId, int $documentId): bool
    {
        return (bool) $this->createQueryBuilder('g')
            ->andWhere('g.commande = :commandeId')
            ->andWhere('g.document = :documentId')
            ->setParameter('commandeId', $commandeId)
            ->setParameter('documentId', $documentId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère tous les documents liés à une commande donnée
     *
     * @return Document[] Liste des documents associés à la commande
     */
    public function findDocumentsForCommande(int $commandeId): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.document')
            ->andWhere('g.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère toutes les commandes liées à un document donné
     *
     * @return Commande[] Liste des commandes associées à un document
     */
    public function findCommandesForDocument(int $documentId): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.commande')
            ->andWhere('g.document = :documentId')
            ->setParameter('documentId', $documentId)
            ->getQuery()
            ->getResult();
    }
}
