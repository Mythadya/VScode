<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Document>
 *
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @return Document[] Returns an array of Document objects filtered by a specific mode of payment
     */
    public function findByModePaiement(string $modePaiement): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.modePaiement = :modePaiement')
            ->setParameter('modePaiement', $modePaiement)
            ->orderBy('d.idDocument', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Document[] Returns an array of Document objects filtered by a specific type
     */
    public function findByType(string $type): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.type = :type')
            ->setParameter('type', $type)
            ->orderBy('d.dateDocument', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Document|null Returns a Document object by its associated Commande id
     */
    public function findOneByCommandeId(int $commandeId): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Document[] Returns an array of Document objects created between two specific dates
     */
    public function findDocumentsByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.dateDocument BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->orderBy('d.dateDocument', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Document[] Returns an array of Document objects sorted by total amount (TTC)
     */
    public function findAllSortedByMontantTotalTTC(): array
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.montantTotalTTC', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
