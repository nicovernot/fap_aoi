<?php

namespace App\Repository;

use App\Entity\EnergieApresTravaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EnergieApresTravaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnergieApresTravaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnergieApresTravaux[]    findAll()
 * @method EnergieApresTravaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnergieApresTravauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnergieApresTravaux::class);
    }

    // /**
    //  * @return EnergieApresTravaux[] Returns an array of EnergieApresTravaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnergieApresTravaux
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
