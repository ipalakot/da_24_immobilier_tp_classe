<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Employe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Intitulé',
                'required' => true,
                'disabled' => false,
                'empty_data' => 'Sans Reference',
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'titre',
            ])

            ->add('agence', EntityType::class, [
                'class' => Agence::class,
                'choice_label' => 'numeroAgence',
            ])

            ->add('employe', EntityType::class, [
                'class' => Employe::class,
                'choice_label' => 'id',
                'label' => "Gestionnaire",
            ])

            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',
                'label' => "Proprio",
            ])

            ->add('type', ChoiceType::class, [
                'choices' => [
                    'F1' => 'F1',
                    'F2' => 'F2',
                    'F3' => 'F3',
                    'F4' => 'F4',
                    'F5' => 'F5',
                    'F6' => 'F6',
                    'F0' => 'Autre',
                ],
            ])

            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse',
                'required' => true,
                'disabled' => false,
            ])

            ->add('surface', IntegerType::class, [])
            ->add('prix', IntegerType::class, [])
            ->add('owner')

            ->add('description', TextareaType::class, [
                'label' => 'Description'])

            ->add('une', ChoiceType::class, [
                'choices' => [
                    'true' => true,
                    'false' => false,

                ],
                'label' => "Mettre à la Une",
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
            'data_class' => Article::class,
        ]);
    }
}