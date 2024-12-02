<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Employe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmployeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EMPLOYE_REFERENCE = 'employe_';
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 50; $i++) { 
            $employe = new Employe();
            $employe->setNom($faker->lastName())
            ->setPrenom($faker->firstName())
            ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade()))
            ->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade()))
            ;
            $manager->persist($employe);



        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AgenceFixtures::class,
        ];
    }
}
