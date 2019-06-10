<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\IeiMenu;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Route\RouteCollection;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Symfony\Component\HttpFoundation\Request;

final class IeiSsmenuAdmin extends AbstractAdmin
{

    protected function configureRoutes(RouteCollection $collection)
    {
        if ($this->isChild()) {
               return;         

        }

        // This is the route configuration as a parent
     //   $collection->clear();
}

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');
           
         $menu->addchild('Voir Sous-Menu', [
            'uri' => $admin->generateUrl('show', ['id' => $id])
        ]);
	 if ($this->isGranted('EDIT')) {
            $menu->addChild('Editer Sous-Menu', [
                'uri' => $admin->generateUrl('edit', ['id' => $id])
            ]);
        }
        
             if ($this->isGranted('LIST')) {
            $menu->addChild('gerer Onglets', [
                'uri' => $admin->generateUrl('admin.ieiOnglet.list', ['id' => $id])
            ]);
        }

        }





    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('idssm')
			->add('idmen')
			->add('ssmcod')
			->add('ssmlib')
			->add('ssmord')
			->add('ssmcom')
			->add('ssmmaj')
			->add('ssmphp')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
              $listMapper
			->add('idssm')
			->add('idmen')
			->add('ssmcod')
			->add('ssmlib')
			->add('ssmord')
			->add('ssmcom')
			->add('ssmmaj')
			->add('ssmphp')
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
		//	->add('idssm')
                        ->add('idmen')
//			->add('idmen',EntityType::class, [
 //           'class' => IeiMenu::class,
//            'choice_value' =>  'idmen',
//            'choice_label' => 'menlib',
//        ])
			->add('ssmcod')
			->add('ssmlib')
			->add('ssmord')
			->add('ssmcom')
			->add('ssmmaj')
			->add('ssmphp')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
			->add('idssm')
			->add('idmen')
			->add('ssmcod')
			->add('ssmlib')
			->add('ssmord')
			->add('ssmcom')
			->add('ssmmaj')
			->add('ssmphp')
			;
    }



public function createQuery($context = 'list')
 {
     $query = parent::createQuery($context);
 //$id = $this->getRequest()->get('id'); 
 //  var_dump($query);
if ($this->isChild()) {
      $builder = $query->getQueryBuilder();
 $id = $this->getRequest()->get('id'); 

     $builder->andWhere($builder->getRootAlias() . '.idmen=:id')->setParameter(':id', $id );
    
        }
 
    return $query;
 }

public function getDashboardActions()
    {
        $actions = parent::getDashboardActions();

        unset($actions['create']);

        return $actions;
    }


}
