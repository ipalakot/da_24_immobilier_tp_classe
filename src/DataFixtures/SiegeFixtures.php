<?php

namespace App\DataFixtures;

use App\Entity\Siege;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SiegeFixtures extends Fixture implements DependentFixtureInterface
{
    public const SIEGE_REFERENCE = 'siege_';
    public function load(ObjectManager $manager): void
{
    $faker = Factory::create('fr_FR');

    for ($i = 0; $i <= 1; $i++) { 
        $siege = new Siege();
        $siege->setCapital($faker->randomNumber())
              ->setNom($faker->unique()->lastName())
              ->setAdresse($faker->streetAddress());

        $directeurReference = DirecteurFixtures::DIRECTEUR_REFERENCE . $i;
        $directeur = $this->getReference($directeurReference);
        $siege->setDirecteur($directeur);

        $manager->persist($siege);
        $this->addReference(self::SIEGE_REFERENCE . $i, $siege);
    }

    $manager->flush();
}

    public function getDependencies(): array
    {
        return [
            DirecteurFixtures::class,
        ];
    }
}
