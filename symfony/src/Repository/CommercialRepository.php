<?php

namespace App\Repository;

use App\Entity\Commercial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commercial>
 *
 * @method Commercial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commercial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commercial[]    findAll()
 * @method Commercial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommercialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commercial::class);
    }

    /**
     * @return Commercial[] Returns an array of Commercial objects based on the name
     */
    public function findByNom(string $nom): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nom = :nom')
            ->setParameter('nom', $nom)
            ->orderBy('c.idCommercial', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commercial[] Returns an array of Commercial objects based on the first name
     */
    public function findByPrenom(string $prenom): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.prenom = :prenom')
            ->setParameter('prenom', $prenom)
            ->orderBy('c.idCommercial', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commercial|null Returns a Commercial object based on the email
     */
    public function findOneByEmail(string $email): ?Commercial
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Commercial[] Returns an array of Commercial objects based on the phone number
     */
    public function findByTelephone(string $telephone): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.telephone = :telephone')
            ->setParameter('telephone', $telephone)
            ->orderBy('c.idCommercial', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Commercial[] Returns all Commercial objects ordered by last name
     */
    public function findAllOrderedByName(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
