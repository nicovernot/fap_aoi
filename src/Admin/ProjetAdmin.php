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
            ->add('typeprojet') 
            ->add('place1') 
            ->add('surface') 
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
            ->add('adress' )   
            ->add('typeprojet') 
            ->add('place1') 
            ->add('surface') 
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
            ->add('typeprojet') 
            ->add('surface') 
           ;

            $formMapper  
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
                'property' => 'user'
            ])   
   
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
        ->add('typeprojet') 
        ->add('place1')  
        ->add('surface') 
        ->end()
    ->end()
            
            
            ;
    }
}
