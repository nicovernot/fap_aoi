<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

final class MagazineAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
			->add('titre')
			->add('numerosparan')
			->add('presentation')
			->add('prixann')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			->add('id')
			->add('titre')
			->add('numerosparan')
			->add('presentation')
			->add('prixann')
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
		$imageFieldOptions = [];
		$formMapper
			
			->add('titre')
			->add('numerosparan')
			->add('presentation')
			->add('prixann')
			->add('image', ModelType::class, $imageFieldOptions)
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
			->add('id')
			->add('titre')
			->add('numerosparan')
			->add('presentation')
			->add('prixann')
			;
    }
}
