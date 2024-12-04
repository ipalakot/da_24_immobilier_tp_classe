<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Articles[] Returns an array of Users objects
     */
    public function getTriAsc(string $champ): array
    {
        $query = $this  ->createQueryBuilder('a')
                        ->select('a')
                        ->orderBy('a.' . $champ, 'ASC')
                        ->getQuery();
        return $query   ->getResult();
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    /*public function getTriAsc(string $champ): array
    {
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.' . $champ, 'ASC')
            ->getQuery();
        return $query->getResult();
    } */


    public function findTrieArtcles_AZ()
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.titre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findTrietype_AZ()
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.type', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findTrieAdresse_AZ()
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.adresse', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findTrieSurface_AZ()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.surface', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAscPrice()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findCategorieLocAppart(): array
    {
        return $this->createQueryBuilder('a')
        ->join('a.categorie', 'v')
        ->andWhere('v.titre= :val')
        ->setParameter('val', 'location-Appart')
        ->orderBy('a.id', 'ASC')
        ->getQuery()
        ->getResult();
    }

    public function findCategorieLocMaison(): array
    {
        return $this->createQueryBuilder('a')
        ->join('a.categorie', 'v')
        ->andWhere('v.titre= :val')
        ->setParameter('val', 'location-Maison')
        ->orderBy('a.id', 'ASC')
        ->getQuery()
        ->getResult();
    }


    public function findCategorieVenteAppart(): array
    {
        return $this->createQueryBuilder('a')
        ->join('a.categorie', 'v')
        ->andWhere('v.titre= :val')
        ->setParameter('val', 'Vente-Appart')
        ->orderBy('a.id', 'ASC')
        ->getQuery()
        ->getResult();
    }

    public function findCategorieVenteMaison(): array
    {
        return $this->createQueryBuilder('a')
        ->join('a.categorie', 'v')
        ->andWhere('v.titre= :val')
        ->setParameter('val', 'Vente-Maison')
        ->orderBy('a.adresse', 'ASC')
        ->getQuery()
        ->getResult();findCategorieVenteAppartn();
    }

    public function findCategorieVenteAppartn(): array
    {
        return $this->createQueryBuilder('a')
        ->join('a.categorie', 'v')
        ->andWhere('v.titre= :val')
        ->setParameter('val', 'Vente-Appart.')
        ->orderBy('a.adresse', 'ASC')
        ->getQuery()
        ->getResult();
    }

    

    



    public function findAscCreatedAt()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //trier par auteur 
    public function findAscAuteur()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.auteur', 'ASC')
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Article[] Returns an array of Article objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
