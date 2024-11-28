<?php

namespace App\Form;

use App\Entity\Utilisateur;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Noms',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Utilisateur Anonyme',
        ])
        
        ->add('prenoms', TextType::class, [
            'label' => 'Prénoms',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Prénoms',
        ])

        ->add('adresse', TextareaType::class, [
            'label' => 'Adresse',
            'required'   => true,
            'disabled'=> false, 
           
        ])

        ->add('age', IntegerType::class, [
            'label' => 'Age',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Reference',
        ])

        ->add('phone', IntegerType::class, [
            'label' => 'Téléphone',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Reference',
        ])
        ->add('email', EmailType::class, [
            'label' => 'Courriel',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Reference',
        ])

        ->add('login', TextType::class, [
            'label' => 'Login',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Ref Anonyme',
        ])
        ->add('login', PasswordType::class, [
            'label' => 'Mot de passe',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Ref Anonyme',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
