<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Client>
 *
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    /**
     * @return Client[] Returns an array of Client objects based on the client's last name
     */
    public function findByNom(string $nom): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nom = :nom')
            ->setParameter('nom', $nom)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects based on the client's first name
     */
    public function findByPrenom(string $prenom): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.prenom = :prenom')
            ->setParameter('prenom', $prenom)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects based on the client's email
     */
    public function findByEmail(string $email): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.email = :email')
            ->setParameter('email', $email)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects based on the client type
     */
    public function findByTypeClient(string $typeClient): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.typeClient = :typeClient')
            ->setParameter('typeClient', $typeClient)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Client|null Returns a Client object based on the client reference (refClient)
     */
    public function findOneByRefClient(string $refClient): ?Client
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.refClient = :refClient')
            ->setParameter('refClient', $refClient)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Client[] Returns an array of Client objects based on the commercial name
     */
    public function findByNomCommercial(string $nomCommercial): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nomCommercial = :nomCommercial')
            ->setParameter('nomCommercial', $nomCommercial)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Client[] Returns an array of Client objects based on their SIRET number
     */
    public function findByNumeroSiret(string $numeroSiret): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.numeroSiret = :numeroSiret')
            ->setParameter('numeroSiret', $numeroSiret)
            ->orderBy('c.idClient', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
