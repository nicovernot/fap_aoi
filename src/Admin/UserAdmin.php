<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class UserAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			
			->add('email')
					
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('rue')
			->add('numeroRue')
			->add('ville')
			->add('codepostal')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
		
			->add('email')
		
		
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('rue')
			->add('numeroRue')
			->add('ville')
			->add('codepostal')
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
		
			->add('email')
			
			
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('rue')
			->add('numeroRue')
			->add('ville')
			->add('codepostal')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
		
			->add('email')
			
		
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('rue')
			->add('numeroRue')
			->add('ville')
			->add('codepostal')
			;
    }
}
