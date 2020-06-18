<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class AdressAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            
            ->add('ville')
            ->add('nrue')
            ->add('nomrue')
            ->add('codepostal')
            ->add('departement')
            ->add('energie')
            ->add('taillesurface')
            ->add('typehabitat')
            ->add('user')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('user')
            ->add('ville')
            ->add('nrue')
            ->add('nomrue')
            ->add('codepostal')
            ->add('departement')
            ->add('energie')
            ->add('taillesurface')
            ->add('typehabitat')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('user')
            ->add('ville')
            ->add('nrue')
            ->add('nomrue')
            ->add('codepostal')
            ->add('departement')
            ->add('energie')
            ->add('taillesurface')
            ->add('typehabitat')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('user')
            ->add('ville')
            ->add('nrue')
            ->add('nomrue')
            ->add('codepostal')
            ->add('departement')
            ->add('energie')
            ->add('taillesurface')
            ->add('typehabitat')
            ;
    }
}
