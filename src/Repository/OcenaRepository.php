<?php

namespace App\Repository;

use App\Entity\Ocena;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ocena|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ocena|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ocena[]    findAll()
 * @method Ocena[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OcenaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ocena::class);
    }

    // /**
    //  * @return Ocena[] Returns an array of Ocena objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ocena
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
