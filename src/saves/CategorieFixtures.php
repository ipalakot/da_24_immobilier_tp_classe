<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $categorie = new Categorie();
            $categorie->setTitre($faker->sentence())
                ->setDescription($faker->paragraph($nbSentences = 10));

            $manager->persist($categorie);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
