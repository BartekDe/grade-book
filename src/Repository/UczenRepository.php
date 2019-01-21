<?php

namespace App\Repository;

use App\Entity\Uczen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uczen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uczen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uczen[]    findAll()
 * @method Uczen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UczenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uczen::class);
    }

    // /**
    //  * @return Uczen[] Returns an array of Uczen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uczen
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
