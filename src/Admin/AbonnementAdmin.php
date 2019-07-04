<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Route\RouteCollection;

final class AbonnementAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
{
    $collection->add('rembourser', $this->getRouterIdParameter().'/rembourser');
}


    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
        ->add('client')
        ->add('magazine')
        ->add('encours')
        ->add('date')
        ->add('dateremboursement')

			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
        ->add('client')
        ->add('magazine')
        ->add('encours')
        ->add('date')
        ->add('remboursement')
        ->add('dateremboursement')
			->add('_action', null, [
                'actions' => [
                    'rembourser' => [
                        'template' => 'list__action_rembourser.html.twig',
                    ],
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
        ->add('client')
        ->add('magazine')
        ->add('encours')
        ->add('date')
        ->add('remboursement')
        ->add('dateremboursement')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
        ->add('client')
        ->add('magazine')
        ->add('encours')
            ->add('date')
            ->add('remboursement')
            ->add('dateremboursement')
            ;
    }
}
