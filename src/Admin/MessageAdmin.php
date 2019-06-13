<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;

final class MessageAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			
			->add('message')
            ->add('date')
            ->add('client')
            ->add('typemessage')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			
			->add('message')
            ->add('date')
            ->add('client')
            ->add('typemessage')
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
			
            ->add('message')
            ->add('typemessage')
            ->add('client')
			->add('date')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
			
			->add('message')
			->add('date')
			;
    }
}
