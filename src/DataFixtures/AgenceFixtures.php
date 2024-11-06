<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AgenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 50; $i++) { 
            $agence = new Agence();
            $agence->setNumeroAgence($faker->randomNumber($nbDigits = NULL, $strict = false))
            ->setAdresse($faker->streetAddress())
            ;
            $manager->persist($agence);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
