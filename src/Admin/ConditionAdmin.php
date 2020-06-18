<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class ConditionAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
           
            ->add('nom')
            ->add('description')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
           
            ->add('nom')
            ->add('description')
            ->add('place')
            ->add('typedocument')
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
           
            ->add('nom')
            ->add('description')
            ->add('place' ,ModelAutocompleteType::class, [
                'property' => 'nom'
            ])
            ->add('typedocument')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
          
            ->add('nom')
            ->add('description')
            ->add('place')
            ->add('typedocument')
            ;
    }
}
