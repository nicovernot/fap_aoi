<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class MessageAdmin extends AbstractAdmin
{


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('clone', $this->getRouterIdParameter().'/clone');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			
			->add('message')
            ->add('date')
            ->add('client')
            ->add('typeMessages')
            
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			
			->add('message')
            ->add('date')
            ->add('client')
            ->add('typeMessages')
            
			->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'clone' => [
                        'template' => 'list__action_clone.html.twig',
                    ],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
			
            ->add('message')
            ->add('client')
            ->add('typeMessages')
			->add('date')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
        ->add('client')
        ->add('typeMessages')
			->add('message')
			->add('date')
			;
    }
}
