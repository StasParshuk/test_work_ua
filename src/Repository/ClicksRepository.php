<?php

namespace App\Repository;

use App\Entity\Clicks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clicks>
 *
 * @method Clicks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clicks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clicks[]    findAll()
 * @method Clicks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClicksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clicks::class);
    }

//    /**
//     * @return Clicks[] Returns an array of Clicks objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clicks
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
