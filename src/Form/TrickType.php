<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\TrickGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trickName', null, [
                'required' => false,
            ]) 
            ->add('trickDescription', null, [
                'required' => false,
            ])
            ->add('trickGroup', EntityType::class, [
                'class' => TrickGroup::class,
                'choice_label' => 'groupName'
            ])
            ->add('trickImage', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
