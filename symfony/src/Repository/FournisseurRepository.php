<?php

namespace App\Repository;

use App\Entity\Fournisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fournisseur>
 *
 * @method Fournisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fournisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fournisseur[]    findAll()
 * @method Fournisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FournisseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fournisseur::class);
    }

    /**
     * @return Fournisseur[] Returns an array of Fournisseur objects with a specific name
     */
    public function findByNomFournisseur(string $nomFournisseur): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.nomFournisseur LIKE :nomFournisseur')
            ->setParameter('nomFournisseur', '%' . $nomFournisseur . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère un fournisseur par son adresse
     *
     * @return Fournisseur|null
     */
    public function findByAdresseFournisseur(string $adresse): ?Fournisseur
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.adresseFournisseur = :adresse')
            ->setParameter('adresse', $adresse)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Vérifie si un fournisseur existe par son numéro de téléphone
     *
     * @return bool True si le fournisseur existe, sinon False
     */
    public function fournisseurExistsByTelephone(string $telephone): bool
    {
        return (bool) $this->createQueryBuilder('f')
            ->andWhere('f.telephoneFournisseur = :telephone')
            ->setParameter('telephone', $telephone)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère tous les fournisseurs qui ont un nom partiellement similaire à celui donné
     *
     * @return Fournisseur[] Liste des fournisseurs
     */
    public function findFournisseursWithSimilarName(string $searchTerm): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.nomFournisseur LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère un fournisseur par son email
     *
     * @return Fournisseur|null
     */
    public function findByEmailFournisseur(string $email): ?Fournisseur
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.emailFournisseur = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
