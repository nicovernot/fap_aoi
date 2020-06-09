<?php

namespace App\Repository;

use App\Entity\FamilleProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FamilleProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilleProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilleProjet[]    findAll()
 * @method FamilleProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilleProjet::class);
    }

    // /**
    //  * @return FamilleProjet[] Returns an array of FamilleProjet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamilleProjet
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
