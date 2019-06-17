<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Image;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class ImageAdminController extends CRUDController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function handleOfferForm(Request $request)
{

    $this->session->set('image', 'img');
    $image = new Image();
    $file = $request->files->get('file');
    $image->setFile($file);
    
    $image->upload();
}

}
