<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisateur>
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    
    //Recherche d’un utilisateur
    public function rechUtil($dateMin, $dateMax): array
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('u')
        ->from(User::class, 'u')
        ->where('u.firstname LIKE :firstname')
        ->andWhere('u.lastname = :lastname')
        ->setParameter('firstname', 'First %')
        ->setParameter('lastname', 'LAST 3');

        $query = $queryBuilder->getQuery();

        echo $query->getDQL(), "\n";
        foreach ($query->getResult() as $user) {
            echo $user;
        }
    }


    

    public function findUtilisateursAge()
    {
        $qb = $this->createQueryBuilder('u');

        $qb
           // ->select('u.id', 'u.nom', 'u.prenoms', 'u.adresse', 'u.email', 'u.login', 'u.password', 'u.phone')
            ->where('u.age =:ageUtil ')
            ->setParameter('ageUtil', '22')
            ->orderBy('u.nom', 'ASC');

        return $qb->getQuery()->getResult();
    }




    public function rechUtilAge($dateMin, $dateMax): array
    {
        $query = $this->createQueryBuilder('u')
         // ->select('u')
            ->where('u.datenaiss <= :datemax')
            ->andWhere('u.datenaiss >= :datemin')
            ->setParameters(
                array('datemin'=> $dateMin,
                    'datemax'=> $dateMax,
                    )
            )
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery();
        return $query->getResult();
    }

    
    
    public function add(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }




    
    /**
    * @return Users[] Returns an array of Users objects
    */
    public function getTriAsc(string $champ): array
    {
        $query = $this->createQueryBuilder('u')
            ->select('u')
            ->orderBy('u.' . $champ, 'ASC')
            ->getQuery();
        return $query->getResult();
    }




/**
* @return Users[] Returns an array of Users objects
*/
    public function getUsersBetween($ageMin, $ageMax): array
    {
        $query = $this->createQueryBuilder('u')
         // ->select('u')
            ->where('u.age <= :agemax')
            ->andWhere('u.age >= :agemin')
            ->setParameters(
                array('agemin'=> $ageMin,
                    'agemax'=> $ageMax,
                    )
            )
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery();
        return $query->getResult();
    }

    /**
    * @return Users[] Returns an array of Users objects
    */
    public function getTriAsc2(string $champ): array
    {
        $query = $this->createQueryBuilder('u')
            ->select('u')
            ->orderBy('u.' . $champ, 'ASC')
            ->getQuery();
        return $query->getResult();
    }




    //    /**
    //     * @return Utilisateur[] Returns an array of Utilisateur objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Utilisateur
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
