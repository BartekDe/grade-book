<?php

namespace App\Repository;

use App\Entity\Nauczyciel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Nauczyciel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nauczyciel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nauczyciel[]    findAll()
 * @method Nauczyciel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NauczycielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nauczyciel::class);
    }

    // /**
    //  * @return Nauczyciel[] Returns an array of Nauczyciel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nauczyciel
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
