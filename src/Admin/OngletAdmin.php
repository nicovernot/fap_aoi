<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;



final class OngletAdmin extends AbstractAdmin
{

	

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Voir Onglets', [
            'uri' => $admin->generateUrl('show', ['id' => $id])
        ]);

        if ($this->isGranted('EDIT')) {
            $menu->addChild('Editer Onglets', [
                'uri' => $admin->generateUrl('edit', ['id' => $id])
            ]);
        }

        if ($this->isGranted('LIST')) {
            $menu->addChild('Gerer Champs', [
                'uri' => $admin->generateUrl('admin.champs.list', ['id' => $id])
            ]);
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
			->add('ssmenu')
			->add('ongcod')
			->add('onglib')
			->add('ongord')
			->add('onglec')
			->add('ongcre')
			->add('ongupd')
			->add('ongadm')
			->add('ongcom')
			->add('ongmaj')
			->add('ongphp')
			->add('ongsql')
			->add('ongdef')
			->add('ongsqlcre')
			->add('ongsqlupd')
			->add('ongsqldel')
			->add('ongcon')
			
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			->add('id')
			->add('ssmenu')
			->add('ongcod')
			->add('onglib')
			->add('ongord')
			->add('onglec')
			->add('ongcre')
			->add('ongupd')
			->add('ongadm')
			->add('ongcom')
			->add('ongmaj')
			->add('ongphp')
			->add('ongsql')
			->add('ongdef')
			->add('ongsqlcre')
			->add('ongsqlupd')
			->add('ongsqldel')
			->add('ongcon')
			
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
		//	->add('idong')
			->add('ssmenu')
			->add('ongcod')
			->add('onglib')
			->add('ongord')
			->add('onglec')
			->add('ongcre')
			->add('ongupd')
			->add('ongadm')
			->add('ongcom')
			->add('ongmaj')
			->add('ongphp')
			->add('ongsql')
			->add('ongdef')
			->add('ongsqlcre')
			->add('ongsqlupd')
			->add('ongsqldel')
			->add('ongcon')
			
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {

        $showMapper
			->add('id')
			->add('ssmenu')
			->add('ongcod')
			->add('onglib')
			->add('ongord')
			->add('onglec')
			->add('ongcre')
			->add('ongupd')
			->add('ongadm')
			->add('ongcom')
			->add('ongmaj')
			->add('ongphp')
			->add('ongsql')
			->add('ongdef')
			->add('ongsqlcre')
			->add('ongsqlupd')
			->add('ongsqldel')
			->add('ongcon')
			
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

     $builder->andWhere($builder->getRootAlias() . '.ssmenu=:id')->setParameter(':id', $id );
    
        }
 
    return $query;
 }
 
}
