<?php

namespace App\Repository;

use App\Entity\TypeHabitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeHabitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHabitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHabitation[]    findAll()
 * @method TypeHabitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHabitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHabitation::class);
    }

    // /**
    //  * @return TypeHabitation[] Returns an array of TypeHabitation objects
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
    public function findOneBySomeField($value): ?TypeHabitation
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
