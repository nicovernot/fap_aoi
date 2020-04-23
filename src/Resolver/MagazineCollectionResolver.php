<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;
use App\Entity\Magazine;

final class MagazineCollectionResolver implements QueryCollectionResolverInterface
{
    /**
     * @param iterable<Magazine> $collection
     *
     * @return iterable<Magazine>
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].

        foreach ($collection as $Magazine) {
            // Do something with the Magazine.
            
        }

        return $collection;
    }
}