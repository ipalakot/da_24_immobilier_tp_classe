<?php

namespace App\Repository;

use App\Entity\Employe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employe>
 */
class EmployeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employe::class);
    }

    /**
     *  @return Employe [] par Noms
     */
    public function findTrieEmployeNoms_AZ()
    {
        return $this->createQueryBuilder('e')
            ->select('e')
            ->orderBy('e.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     *  @return Employe [] par Prenoms
     */
    public function findTrieEmployePrenoms_AZ()
    {
        return $this->createQueryBuilder('e')
            ->select('e')
            ->orderBy('e.prenom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //Lister les Employes par ordre ASC d'Agences
    public function findEmplAgenceASC()
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->join('a.agence', 'c')
            ->orderBy('c.adresse', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Employe [] par Agence et Direction
     */
    public function findTrieArtcles_AZ()
    {
        return $this->createQueryBuilder('e')
            ->select('e')
            ->join('e.agence', 'a')
            ->orderBy('a.adresse', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Employe[] Returns an array of Employe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Employe
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
