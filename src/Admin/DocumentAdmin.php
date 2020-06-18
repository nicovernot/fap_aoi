<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Templating\TemplateRegistry;

final class DocumentAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
           
            ->add('nom')
            ->add('fichier')
            ->add('valide')
            ->add('conditionplace')
            ->add('user')
            ->add('projet')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
           
            ->add('nom')
            ->add('fichier',null, ['template' => 'urlfield.html.twig'])
            ->add('valide')
            ->add('conditionplace')
            ->add('user')
            ->add('projet')
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
           
            ->add('nom')
            ->add('fichier')
            ->add('valide')
            ->add('conditionplace')
            ->add('user')
            ->add('projet')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
           
            ->add('nom')
            ->add('fichier')
            ->add('valide')
            ->add('conditionplace')
            ->add('user')
            ->add('projet')
            ;
    }
}
