<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class PaiementAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
        
        ->add('client')
        ->add('abonnement')
    	->add('idpaiement')
        ->add('date')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
        ->add('client')
        ->add('abonnement')
    	->add('idpaiement')
			->add('date')
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
        ->add('client')
        ->add('abonnement')
    	->add('idpaiement')
			->add('date')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
        ->add('client')
        ->add('abonnement')
    	->add('idpaiement')
			->add('date')
			;
    }
}
