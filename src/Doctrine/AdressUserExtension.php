<?php
// api/src/Doctrine/CurrentUserExtension.php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Abonnement;
use Doctrine\ORM\QueryBuilder;
use App\Entity\User;
use App\Entity\Adress;
use Symfony\Component\Security\Core\Security;
use Psr\Log\LoggerInterface;



final class AdressUserExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $security;
    private $logger;
    
    public function __construct(Security $security,LoggerInterface $logger)
    {
        $this->security = $security;
        $this->logger = $logger;
    }
    
    /**
    * {@inheritdoc}
    */

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
      
        $this->addWhere($queryBuilder, $resourceClass);
    }

    /**
    * {@inheritdoc}
    */

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    /**
    *
    * @param QueryBuilder $queryBuilder
    * @param string       $resourceClass
    */

    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if (Adress::class !== $resourceClass || null === $user = $this->security->getUser()) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.user = :current_user', $rootAlias));
        $queryBuilder->setParameter('current_user', $user);
    }
}
