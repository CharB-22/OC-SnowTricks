<?php

namespace App\Form;

use App\Entity\TrickVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('videoUrl', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'my-2',
                    'placeholder' => 'Lien youtube de la vidéo'
                ],
                'required' => false,
            ])
            ->add('Supprimer', ButtonType::class, [
                'attr' => ['class' => 'btn btn-outline-danger btn-remove'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TrickVideo::class,
        ]);
    }
}
