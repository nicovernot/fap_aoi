<?php

namespace App\Form;

use App\Entity\IeiMenu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IeiMenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mencod')
            ->add('menlib')
            ->add('menord')
            ->add('mencom')
            ->add('mendat')
            ->add('menphp')
            ->add('mensql')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IeiMenu::class,
        ]);
    }
}
