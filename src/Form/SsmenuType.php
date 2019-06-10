<?php

namespace App\Form;

use App\Entity\Ssmenu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SsmenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ssmcod')
            ->add('ssmlib')
            ->add('ssmord')
            ->add('ssmcom')
            ->add('ssmmaj')
            ->add('ssmphp')
            ->add('onglet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ssmenu::class,
        ]);
    }
}
