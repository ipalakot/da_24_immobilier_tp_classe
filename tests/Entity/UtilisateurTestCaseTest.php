<?php

namespace App\Tests;

use App\Entity\utilisateur;
use App\Entity\Utilisateur as EntityUtilisateur;

use PHPUnit\Framework\TestCase;

class UtilisateUnitTest extends TestCase
{
    public function testValide(): void
    {
        $utilisateur = new EntityUtilisateur();
        $utilisateur->setNom('Charles')
                    ->setPrenoms('tototata') 
                    ->setAdresse('Rue Chastenet de Gery')
                    ->setEmail('dwwm2@mail.com')
                    ->setLogin('dwwm2')
                    -> setPassword("dwwm2@mail.com")
                    -> setPhone(123456789)
                    ->setAge(20);  
           
                    $this->assertTrue($utilisateur->getNom()==='Charles');
            $this->assertTrue($utilisateur->getPrenoms()==='tototata');
            $this->assertTrue($utilisateur->getAdresse()==='Rue Chastenet de Gery');
            $this->assertTrue($utilisateur->getEmail()==='dwwm2@mail.com');
            $this->assertTrue($utilisateur->getLogin()==='dwwm2');
            $this->assertTrue($utilisateur->getPassword()==="dwwm2@mail.com");
            $this->assertTrue($utilisateur->getPhone()=== 123456789);
            $this->assertTrue($utilisateur->getAge()=== 20);
    }
   

    public function testNonValide(): void
    {
        $utilisateur = new EntityUtilisateur();
        $utilisateur->setNom('toto')
                    ->setPrenoms('tototata') 
                    ->setAdresse('Rue Chastenet de Gery')
                    ->setEmail('dwwm2@mail.com')
                    ->setLogin('dwwm2')
                    -> setPassword("dwwm2@mail.com")
                    -> setPhone(123456789)
                    ->setAge(20);  
            $this->assertFalse($utilisateur->getNom()==='tata');
            $this->assertTrue($utilisateur->getPrenoms()==='tototata');
            $this->assertTrue($utilisateur->getAdresse()==='Rue Chastenet de Gery');
            $this->assertTrue($utilisateur->getEmail()==='dwwm2@mail.com');
            $this->assertTrue($utilisateur->getLogin()==='dwwm2');
            $this->assertTrue($utilisateur->getPassword()==="dwwm2@mail.com");
            $this->assertTrue($utilisateur->getPhone()=== 123456789);
            $this->assertTrue($utilisateur->getAge()=== 20);
    }

    
    public function testVide(): void
    {
        $utilisateur = new EntityUtilisateur();
            $this->assertEmpty($utilisateur->getId());
            $this->assertEmpty($utilisateur->getNom());
            $this->assertEmpty($utilisateur->getPrenoms());
            $this->assertEmpty($utilisateur->getAdresse());
            $this->assertEmpty($utilisateur->getEmail());
            $this->assertEmpty($utilisateur->getLogin());
            $this->assertEmpty($utilisateur->getPassword());
            $this->assertEmpty($utilisateur->getPhone());
            $this->assertEmpty($utilisateur->getAge());
    }
}   