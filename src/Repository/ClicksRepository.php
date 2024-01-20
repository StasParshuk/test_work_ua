<?php

namespace App\Repository;

use App\Entity\Clicks;
use App\Entity\UrlRecord;
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


    public function GetByDateAndUrl(UrlRecord $urlRecord, \DateTimeInterface $dateTime)
    {
        return $this->createQueryBuilder('clicks')
            ->select()
            ->where('clicks.urlRecord = :url_record')
            ->setParameter('url_record', $urlRecord)
            ->andWhere('clicks.Date = :clicks_Date')
            ->setParameter('clicks_Date', $dateTime->format('Y-m-d'))
            ->getQuery()
            ->getOneOrNullResult();
    }
}
