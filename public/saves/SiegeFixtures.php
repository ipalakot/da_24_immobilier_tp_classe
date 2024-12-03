<?php

namespace App\DataFixtures;

use App\Entity\Directeur;
use App\Entity\Siege;


use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SiegeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
{
    $faker = Factory::create('fr_FR');

    for ($i = 0; $i <= 1; $i++) {
        $directeur = new Directeur();
        $directeur->setNom($faker->lastName())
            ->setPrenom($faker->firstName())
            ->setRevenus($faker->randomNumber($nbDigits = NULL, $strict = false))
        ;
        $manager->persist($directeur);
    
    
        for ($j = 0; $j <= 1; $j++) { 
            $siege = new Siege();
            $siege->setCapital($faker->randomNumber())
                ->setNom($faker->unique()->lastName())
                ->setAdresse($faker->streetAddress());
            $siege->setDirecteur($directeur);

            $manager->persist($siege);

        }}

    $manager->flush();
}

    public function getDependencies(): array
    {
        return [
            DirecteurFixtures::class,
        ];
    }
}
