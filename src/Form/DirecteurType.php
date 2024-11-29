<?php

namespace App\Form;

use App\Entity\Directeur;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DirecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Noms',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Ref.',
        ])
        
        ->add('prenom', TextType::class, [
            'label' => 'Prénoms',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Ref.',
        ])
        ->add('revenus', NumberType::class, [
            'label' => 'Revenu',
            'required'   => true,
            'disabled'=> false, 
            'empty_data' => 'Sans Ref.',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Directeur::class,
        ]);
    }
}
