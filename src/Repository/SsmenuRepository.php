<?php

namespace App\Repository;

use App\Entity\Ssmenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ssmenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ssmenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ssmenu[]    findAll()
 * @method Ssmenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SsmenuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ssmenu::class);
    }

    // /**
    //  * @return Ssmenu[] Returns an array of Ssmenu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ssmenu
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
