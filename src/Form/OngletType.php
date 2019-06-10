<?php

namespace App\Form;

use App\Entity\Onglet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OngletType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ongcod')
            ->add('onglib')
            ->add('ongord')
            ->add('onglec')
            ->add('ongcre')
            ->add('ongupd')
            ->add('ongadm')
            ->add('ongcom')
            ->add('ongmaj')
            ->add('ongphp')
            ->add('ongsql')
            ->add('ongdef')
            ->add('ongsqlcre')
            ->add('ongsqlupd')
            ->add('ongsqldel')
            ->add('ongcon')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Onglet::class,
        ]);
    }
}
