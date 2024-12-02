<?php

namespace App\Form;

use App\Entity\Siege;
use App\Entity\Agence;
use App\Entity\Directeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroAgence', IntegerType::class, [
                'label' => 'NumAgence',
                'required'   => true,
                'disabled'=> false, 
                'empty_data' => 'Ref vide',
        ])
            ->add('adresse', TextareaType::class,[
                'label' => 'Adresse',
                'required'   => true,
                'disabled'=> false, 
            ])
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