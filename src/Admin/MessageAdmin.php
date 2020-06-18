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
            ->add('destinataire')
			->add('emeteur')
			->add('message')
            ->add('date')
            ->add('typemessage')
            ->add('sent')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('destinataire')
		    ->add('emeteur')
			->add('message')
            ->add('date')
            ->add('typemessage')
            ->add('sent')
         
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
			
            ->add('emeteur')
            ->add('destinataire')
            ->add('message')
            ->add('typemessage')
			->add('date')
            ->add('sent')

            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
        ->add('emeteur')
        ->add('destinataire')
		->add('message')
		->add('date')
        ->add('typemessage')
        ->add('sent')

        ;
    }
}
