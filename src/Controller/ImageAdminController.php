<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Image;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;

final class ImageAdminController extends CRUDController
{
    public function handleOfferForm(Request $request)
{
    $image = new Image();
    $file = $request->files->get('file');
    $image->setFile($file);
    
    $image->upload();
    var_dump($request);
}

}
