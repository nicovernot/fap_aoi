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


final class MenuAdmin extends AbstractAdmin
{

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Voir Menu', [
            'uri' => $admin->generateUrl('show', ['id' => $id])
        ]);

        if ($this->isGranted('EDIT')) {
            $menu->addChild('Edition Menu', [
                'uri' => $admin->generateUrl('edit', ['id' => $id])
            ]);
        }

        if ($this->isGranted('LIST')) {
            $menu->addChild('Gerer SousMenu', [
                'uri' => $admin->generateUrl('admin.Ssmenu.list', ['id' => $id])
            ]);
        }
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
			->add('mencod')
			->add('menlib')
			->add('menord')
			->add('mencom')
			->add('mendat')
			->add('menphp')
            ->add('mensql')
            ->add('appli')
            ->add('public')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
		
			->add('mencod')
			->add('menlib')
			->add('menord')
			->add('mencom')
			->add('mendat')
			->add('menphp')
			->add('mensql')
            ->add('appli')
            ->add('public')
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
			
			->add('mencod')
			->add('menlib')
			->add('menord')
			->add('mencom')
			->add('mendat')
			->add('menphp')
			->add('mensql')
             ->add('appli')
             ->add('public')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
		
			->add('mencod')
			->add('menlib')
			->add('menord')
			->add('mencom')
			->add('mendat')
			->add('menphp')
			->add('mensql')
            ->add('appli')
            ->add('public')
            ;
    }


}
