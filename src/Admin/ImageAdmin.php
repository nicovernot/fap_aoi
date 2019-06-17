<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


final class ImageAdmin extends AbstractAdmin
{

    

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
            ->add('filename')
			->add('updated')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			->add('id')
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
        $formMapper
        ->add('filename')
        ->add('updated')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
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
