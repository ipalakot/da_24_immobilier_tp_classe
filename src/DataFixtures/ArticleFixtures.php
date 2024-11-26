<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use App\Entity\Article;
use App\Entity\Categorie;

//use Doctrine\Migrations\Version\Factory;
use App\Entity\Directeur;
use App\Entity\Employe;
use App\Entity\Siege;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 2; $i++) {
            $directeur = new Directeur();
            $directeur->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setRevenus($faker->randomNumber($nbDigits = null, $strict = false));
            $manager->persist($directeur);
        }

        for ($i = 0; $i < 2; $i++) {
            $siege = new Siege();
            $siege->setCapital($faker->randomNumber($nbDigits = null, $strict = false))
                ->setNom($faker->lastName())
                ->setAdresse($faker->streetAddress())
                ->setDirecteur($directeur);
            $manager->persist($siege);
        }

        for ($i = 0; $i < 50; $i++) {
            $agence = new Agence();
            $agence->setNumeroAgence($faker->randomNumber($nbDigits = null, $strict = false))
                ->setAdresse($faker->streetAddress())
                ->setSiege($siege)
                ->setDirecteur($directeur);
            $manager->persist($agence);
        }

        for ($i = 0; $i <= 50; $i++) {
            $employe = new Employe();
            $employe->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime($max = 'now', $timezone = null)))
                ->setAgence($agence)
            ;
            $manager->persist($employe);
        }

        for ($i = 0; $i < 5; $i++) {
            $categorie = new Categorie();
            $categorie->setTitre($faker->sentence())
                ->setDescription($faker->paragraph($nbSentences = 10));

            $manager->persist($categorie);
        }

        // Creer 10 Articles de Fake

        for ($j = 0; $j < 10; $j++) {
            $article = new Article();
            $article->setTitre($faker->sentence())
                ->setAdresse($faker->streetAddress())
                ->setImages($faker->imageUrl($width = 400, $height = 200))
                ->setType($faker->numberBetween(1, 6))
                ->setSurface($faker->numberBetween(10, 500))
                ->setPrix($faker->numberBetween(200, 300))
                ->setDescription($faker->paragraph($nbSentences = 10, $variableNbSentences = true))
                ->setGestionnaire($faker->sentence())
                ->setCategorie($categorie)
                ->setAgence($agence)
                ->setEmploye($employe);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
