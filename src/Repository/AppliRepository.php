<?php

namespace App\Repository;

use App\Entity\Appli;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Appli|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appli|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appli[]    findAll()
 * @method Appli[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppliRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Appli::class);
    }

    // /**
    //  * @return Appli[] Returns an array of Appli objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Appli
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
