<?php

namespace App\Repository;

use App\Entity\TailleSurface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TailleSurface|null find($id, $lockMode = null, $lockVersion = null)
 * @method TailleSurface|null findOneBy(array $criteria, array $orderBy = null)
 * @method TailleSurface[]    findAll()
 * @method TailleSurface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TailleSurfaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TailleSurface::class);
    }

    // /**
    //  * @return TailleSurface[] Returns an array of TailleSurface objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TailleSurface
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
