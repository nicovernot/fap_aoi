<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;
use App\Entity\Magazine;

final class MagazineResolver implements QueryItemResolverInterface
{
    /**
     * @param Magazine|null $item
     *
     * @return Magazine
     */
    public function __invoke($item, array $context)
    {
        // Query arguments are in $context['args'].

        // Do something with the Magazine.
        // Or fetch the Magazine if it has not been retrieved.

        return $item;
    }
}