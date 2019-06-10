<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ChampAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
			->add('onglet')
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
			->add('id')
			->add('onglet')
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
			->add('id')
			->add('onglet')
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
			->add('id')
			->add('onglet')
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
        public function createQuery($context = 'list')
 {
     $query = parent::createQuery($context);
 //$id = $this->getRequest()->get('id'); 
 //var_dump($query);
if ($this->isChild()) {
      $builder = $query->getQueryBuilder();
 $id = $this->getRequest()->get('id'); 

     $builder->andWhere($builder->getRootAlias() . '.onglet=:id')->setParameter(':id', $id );
    
        }
 
    return $query;
 }
}
