<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ImageAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			
			->add('filename')
			->add('updated')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			
			->add('filename')
			->add('updated')
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
        $image = $this->getSubject();
         
        $fileFieldOptions = ['required' => false];
        if ($image ) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath().'/public/img';

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview"/>';
        }
        $formMapper
        ->add('filename')
        ->add('updated')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
		
			->add('filename')
			->add('updated')
			;
    }

 public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload($image)
    {
        if ($image->getFilename()) {
            $image->refreshUpdated();
        }
    }
}
