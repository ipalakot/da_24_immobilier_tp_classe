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
 * @return Articles [] retour de liste des articles par Titres
*/

public function trieArticleTitre()
{

    return $this->createQueryBuilder('a')
                ->orderBy('a.titre', 'ASC')
                ->getQuery()
                ->getResult();
}


/** 
 * @return Articles [] retour de liste des articles par Titres
*/
public function trieArticleAdresse()
{

    return $this->createQueryBuilder('a')
                ->orderBy('a.adresse', 'ASC')
                ->getQuery()
                ->getResult();
}

/**
 * Summary of trieArticleTitre
 * @return Articles [] Liste par Type
 */
public function trieArticleType()
{
    return $this->createQueryBuilder('a')
                            ->select('a')
                            ->orderBy('a.type', 'ASC')
                            ->getQuery()
                            ->getResult();
}


/**@return Articles[] by Surface
 * 
*/
public function findTrieSurface_AZ()
{
    return $this->createQueryBuilder('a')
        ->orderBy('a.surface', 'ASC')
        ->getQuery()
        ->getResult();
}

/**
 * Summary of findAscPrice
 * @return mixed / PRice
 */
public function findAscPrice()
{
    return $this->createQueryBuilder('a')
        ->orderBy('a.prix', 'ASC')
        ->getQuery()
        ->getResult();
}

/**
 * Summary of findAllWithVilleParis
 * @return array
 */
public function findAllWithVilleParis(): array
{
    return $this->createQueryBuilder('a')
        ->join('a.ville', 'v')
        ->andWhere('v.nom = :val')
        ->setParameter('val', 'Paris')
        ->orderBy('a.id', 'ASC')
        ->getQuery()
        ->getResult()
    ;
}

/**
 * Summary of findCategorieLocApprt
 * @return array [] by Actegorie Loc Apprt
 */
public function findCategorieLocApprt(): array
{   return $this-> createQueryBuilder('a')
                ->join('a.categorie', 'c')
                ->andWhere('c.titre = :val ')
                ->setparameter('val', 'location-Maison')
                ->orderBy('a.id', 'ASC')
                ->getQuery()
                ->getResult()
                ;
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
