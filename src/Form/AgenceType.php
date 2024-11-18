<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Directeur;
use App\Entity\Siege;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroAgence')
            ->add('adresse')
            ->add('directeur', EntityType::class, [
                'class' => Directeur::class,
                'choice_label' => 'id',
            ])
            ->add('siege', EntityType::class, [
                'class' => Siege::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agence::class,
        ]);
    }
}
