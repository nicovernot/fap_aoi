<?php

namespace App\Form;

use App\Entity\Champ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idchp')
            ->add('chpcha')
            ->add('chpord')
            ->add('chplon')
            ->add('chptyp')
            ->add('chpsai')
            ->add('chpsel')
            ->add('chprec')
            ->add('chplib')
            ->add('onglet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Champ::class,
        ]);
    }
}
