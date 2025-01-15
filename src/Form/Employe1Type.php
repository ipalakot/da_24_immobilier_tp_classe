<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Directeur;
use App\Entity\Employe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\CallbackTransformer;

class Employe1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('agence', EntityType::class, [
                'class' => Agence::class,
                'choice_label' =>'numeroAgence' ,
            ])
            ->add('directeur', EntityType::class, [
                'class' => Directeur::class,
                'choice_label' => 'nom',
            ])

            ->add('nom', TextType::class, [])
            ->add('prenom', TextType::class, [])

            ->add('email', EmailType::class, [])
        ->add('username')
        ->add('password')
        ->add('roles')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
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
            'data_class' => Employe::class,
        ]);
    }
}
