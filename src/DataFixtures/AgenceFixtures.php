<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use App\Entity\Directeur;
use App\Entity\Siege;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AgenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

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
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
