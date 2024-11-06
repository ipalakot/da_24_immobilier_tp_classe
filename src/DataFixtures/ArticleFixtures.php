<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

//use Doctrine\Migrations\Version\Factory;
use Symfony\Bundle\MakerBundle\Generator;

use Faker;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');

        // Creer 10 Articles de Fake

        for ($j = 0; $j < 10; $j++) {
            $article = new Article();
            $article->setTitre($faker->sentence())
                ->setAdresse($faker->streetAddress())
                ->setImages($faker->imageUrl($width = 400, $height = 200))
                ->setType($faker->numberBetween(1, 6))
                ->setSurface($faker->numberBetween(10, 500))
                ->setPrix($faker->numberBetween(200, 300))
                ->setOwner($faker->sentence())
                ->setDescription($faker->paragraph($nbSentences = 10, $variableNbSentences = true))
                ->setGestionnaire($faker->sentence())
                ->setAgence($faker->sentence());

            $manager->persist($article);
        }

        $manager->flush();

    }

}


