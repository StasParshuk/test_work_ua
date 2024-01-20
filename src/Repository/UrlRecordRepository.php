<?php

namespace App\Repository;

use App\Entity\UrlRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UrlRecord>
 *
 * @method UrlRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrlRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrlRecord[]    findAll()
 * @method UrlRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlRecordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrlRecord::class);
    }

//    /**
//     * @return UrlRecord[] Returns an array of UrlRecord objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UrlRecord
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
