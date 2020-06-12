<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;

final class ProjetAdmin extends AbstractAdmin
{


    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
          
            ->add('datedevis')
            ->add('datefacture')
            ->add('nom')
            ->add('user')
            ->add('projectadmin')
            ->add('documents')
            ->add('adress')   
            ->add('place')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            
            ->add('datedevis')
            ->add('datefacture')
            ->add('nom')
            ->add('user')
            ->add('projectadmin')
            ->add('documents')
            ->add('adress')   
            ->add('place')
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
           
            ->add('datedevis')
            ->add('datefacture')
            ->add('nom')
            ->add('user')
            ->add('projectadmin',ModelAutocompleteType::class, [
                'property' => 'email', 
                
                'callback' => function ($admin, $property, $value) {
                    $datagrid = $admin->getDatagrid();
                    $queryBuilder = $datagrid->getQuery();
                   
                    $queryBuilder
                    ->andWhere($queryBuilder->getRootAlias() . '.roles=:roles')
                    ->orWhere($queryBuilder->getRootAlias() . '.roles=:roles1')
                    ->setParameter('roles','["ROLE_USER","ROLE_ADMIN"]')
                    ->setParameter('roles1','["ROLE_ADMIN"]')
                    ;
                    $datagrid->setValue($property, null, $value);
                },
            ])
            ->add('documents')
            ->add('adress', ModelAutocompleteType::class, [
                'property' => 'adress',
                'placeholder' => "Adresse",
                'req_params' => function($entity, $property) {
                    return $entity->getUser();
                },
                'callback' => function ($admin, $property, $value) {
                    $datagrid = $admin->getDatagrid();
                    $queryBuilder = $datagrid->getQuery();
                    $admin->getRequest()->get('req_params');
                    $queryBuilder
                        ->andWhere($queryBuilder->getRootAlias() . '.user=:user')
                        ->setParameter('user', 2 )
                    ;
                    $datagrid->setValue($property, null, $value);
                },
            ])   
            ->add('place')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
        ->tab('General') // the tab call is optional
        ->with('Projet', [
            'class'       => 'col-md-8',
            'box_class'   => 'box box-solid box-info',
            'description' => 'Adresse Projet',
        ])
        ->add('datedevis')
        ->add('datefacture')
        ->add('nom')
        ->add('user')
        ->add('projectadmin')
        ->add('documents')
        ->add('adress')   
        ->add('place')
            // ...
        ->end()
    ->end()
            
            
            ;
    }
}
