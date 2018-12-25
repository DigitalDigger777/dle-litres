<?php

namespace App\Repository;

use App\Entity\LitresJsonData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LitresJsonData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LitresJsonData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LitresJsonData[]    findAll()
 * @method LitresJsonData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LitresJsonDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LitresJsonData::class);
    }

    // /**
    //  * @return LitresJsonData[] Returns an array of LitresJsonData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LitresJsonData
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
