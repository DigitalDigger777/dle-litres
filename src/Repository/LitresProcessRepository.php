<?php

namespace App\Repository;

use App\Entity\LitresProcess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LitresProcess|null find($id, $lockMode = null, $lockVersion = null)
 * @method LitresProcess|null findOneBy(array $criteria, array $orderBy = null)
 * @method LitresProcess[]    findAll()
 * @method LitresProcess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LitresProcessRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LitresProcess::class);
    }

    // /**
    //  * @return LitresProcess[] Returns an array of LitresProcess objects
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
    public function findOneBySomeField($value): ?LitresProcess
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
