<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class IeiChampsAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('idchp')
			->add('idong')
			->add('chplib')
			->add('chpcha')
			->add('chpord')
			->add('chplon')
			->add('chptyp')
			->add('chpsai')
			->add('chpsel')
			->add('chprec')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			->add('idchp')
			->add('idong')
			->add('chplib')
			->add('chpcha')
			->add('chpord')
			->add('chplon')
			->add('chptyp')
			->add('chpsai')
			->add('chpsel')
			->add('chprec')
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
			->add('idchp')
			->add('idong')
			->add('chplib')
			->add('chpcha')
			->add('chpord')
			->add('chplon')
			->add('chptyp')
			->add('chpsai')
			->add('chpsel')
			->add('chprec')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
			->add('idchp')
			->add('idong')
			->add('chplib')
			->add('chpcha')
			->add('chpord')
			->add('chplon')
			->add('chptyp')
			->add('chpsai')
			->add('chpsel')
			->add('chprec')
			;
    }
}
