<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\TrickGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trickName', null, [
                'required' => false,
                'label' => false
            ]) 
            ->add('trickDescription', null, [
                'label' => false,
                'required' => false,
            ])
            ->add('trickGroup', EntityType::class, [
                'label' => false,
                'class' => TrickGroup::class,
                'choice_label' => 'groupName'
            ])
            ->add('trickImages', CollectionType::class, [
                'entry_type' => TrickImageType::class,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ]
            )
            ->add('trickVideos', CollectionType::class, [
                'entry_type' => TrickVideoType::class,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
            'csrf_protection' => false
        ]);
    }
}
