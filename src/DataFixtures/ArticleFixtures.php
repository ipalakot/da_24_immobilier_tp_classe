<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Agence;
use App\Entity\Employe;

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

        // Créer des occurences des Clients
        for ($k = 0; $k < 50; $k++) {
            $client = new Client();
            $client->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setAdresse($faker->sentence())
                ->setType($faker->sentence())
                ->setPhoto($faker->sentence())
                ->setDateNaissance($faker->dateTime())
                ->setEmail($faker->email());
            $manager->persist($client);

            // Creer 4 categories
            for ($i = 0; $i < 4; $i++) {
                $categorie = new Categorie();
                $categorie  ->setTitre($faker->sentence(5))
                            ->setDescription($faker->sentence(10));
                $manager->persist($categorie);

                // Mise en place des Agnece 
                for ($l=0; $l < 4; $l++) { 
                        $agence = new Agence();
                        $agence->setNumeroAgence($faker->randomNumber($nbDigits = NULL, $strict = false))
                        ->setAdresse($faker->streetAddress());
                    $manager->persist($agence);

                    // Employee gestionnaire de biens
                    for ($m=0; $m < 4; $m++) { 
                    $employe = new Employe();
                    $employe->setNom($faker->lastName())
                    ->setPrenom($faker->firstName())
                    ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade()))
                    ->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeThisDecade()))
                    ;
                
                    $manager->persist($employe);
        
                        for ($j = 0; $j < 5; $j++) {
                            $article = new Article();
                            $article->setTitre($faker->sentence())
                                
                                ->setCategorie($categorie )
                                ->setClient($client)
                                ->setAgence($agence)
                                ->setEmploye($employe)   
 
                                ->setAdresse($faker->streetAddress())
                                ->setImages($faker->imageUrl($width = 400, $height = 200))
                                ->setType($faker->numberBetween(1, 6))
                                ->setSurface($faker->numberBetween(10, 500))
                                ->setPrix($faker->numberBetween(200, 300))
                                ->setOwner($faker->sentence())
                                ->setDescription($faker->paragraph($nbSentences = 10, $variableNbSentences = true));
                                                    
                            $manager->persist($article);
                        }
                }
            }
        }
        }

        $manager->flush();

    }

}


