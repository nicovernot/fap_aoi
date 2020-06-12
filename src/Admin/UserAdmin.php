<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class UserAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			
			->add('email')
			->add('roles')		
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('adress')
			
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
		
			->add('email')
		    ->add('roles')
		
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
	
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
		$container = $this->getConfigurationPool()->getContainer();
        $roles = $container->getParameter('security.role_hierarchy.roles');
        $rolesChoices = self::flattenRoles($roles);
       // var_dump($roles);
        $formMapper
		
			->add('email')
			->add('roles', ChoiceType::class, array(
				'choices'  => $rolesChoices,
				'multiple' => true
			 ))
			->add('nom')
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('adress')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
		$AdresseFieldOptions = [];
        $showMapper
		
			->add('email')
			->add('nom')
			->add('roles')	
			->add('prenom')
			->add('tel')
			->add('dateNaissance')
			->add('lieuNaissance')
			->add('adress', ModelType::class, $AdresseFieldOptions)
			
			;
	}
	
			protected static function flattenRoles($rolesHierarchy) 
		{
			$flatRoles = array();
			foreach($rolesHierarchy as $roles) {

				if(empty($roles)) {
					continue;
				}

				foreach($roles as $role) {
					if(!isset($flatRoles[$role])) {
						$flatRoles[$role] = $role;
					}
				}
			}

			return $flatRoles;
		}

}
