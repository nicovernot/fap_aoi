<?php

namespace App\Repository;

use App\Entity\EmpAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmpAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpAdmin[]    findAll()
 * @method EmpAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpAdminRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmpAdmin::class);
    }

    // /**
    //  * @return EmpAdmin[] Returns an array of EmpAdmin objects
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
    public function findOneBySomeField($value): ?EmpAdmin
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
