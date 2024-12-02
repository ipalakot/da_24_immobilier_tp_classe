<?php

namespace App\Form;

use App\Entity\Directeur;
use App\Entity\Siege;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiegeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('capital', IntegerType::class, [
                'label' => 'Capital',
                'required' => true,
                'disabled' => false,
                'empty_data' => 'Sans Reference',

            ])
            ->add('nom', TextType::class, [
                'label' => 'Noms',
                'required' => true,
                'disabled' => false,
                'empty_data' => 'Sans Ref.',
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse',
                'required' => true,
                'disabled' => false,

            ])
            ->add('directeur', EntityType::class, [
                'class' => Directeur::class,
                'choice_label' => 'id',
                'label' => 'Directeur',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Siege::class,
        ]);
    }
}
