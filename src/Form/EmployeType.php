<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Employe;
use App\Entity\Directeur;
use Symfony\Component\Form\AbstractType;
use MailPoetVendor\Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [])
        ->add('prenom', TextType::class, [])
        ->add('email', EmailType::class, [])
        ->add('username')
        ->add('password')
        ->add('roles')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('agence', EntityType::class, [
                'class' => Agence::class,
                'choice_label' => 'id',
            ])
            ->add('directeur', EntityType::class, [
                'class' => Directeur::class,
                'choice_label' => 'id',
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image / Photo',
                'allow_delete' => true,
                'delete_label' => '...',
                'download_uri' => '...',
                'download_label' => '...',
                'asset_helper' => true,
            ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
