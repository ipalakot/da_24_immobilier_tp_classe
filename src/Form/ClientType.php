<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

use Symfony\Component\Form\CallbackTransformer;


class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [])
            ->add('prenom', TextType::class, [])
            ->add('adresse', TextareaType::class)
            ->add('type', TextType::class, [])
            ->add('roles')
            ->add('password')
            ->add('username')
            ->add('imageFile', VichImageType::class,[
                'label' => 'Image / Photo',
                'allow_delete' => true,
                'delete_label' => '...',
                'download_uri' => '...',
                'download_label' => '...',
                'asset_helper' => true,
                ] 
            )

            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('email', EmailType::class, [])
            ->add('employe', EntityType::class, [
                'class' => Employe::class,
                'choice_label' => 'id',
            ])
            ->add('agence', EntityType::class, [
                'class' => Agence::class,
                'choice_label' => 'id',
            ])
        ;
              // Data transformer
                $builder->get('roles')
                ->addModelTransformer(new CallbackTransformer(
                    function ($rolesArray) {
                        // transform the array to a string
            return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
            // transform the string back to an array
            return [$rolesString];
                     }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
