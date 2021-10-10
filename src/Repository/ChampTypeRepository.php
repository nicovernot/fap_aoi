<?php

namespace App\Repository;

use App\Entity\ChampType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampType[]    findAll()
 * @method ChampType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampType::class);
    }

    // /**
    //  * @return ChampType[] Returns an array of ChampType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChampType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
