<?php

namespace App\Service;

use App\Entity\Clicks;
use App\Entity\UrlRecord;
use App\Factory\ClicksFactory;
use Doctrine\ORM\EntityManagerInterface;

class UrlRecordService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /**
     * Збільшує лічильник переходів создае якщо лічильника за дату немае
     */
    public function incrementClicksCount(?Clicks $clicks, UrlRecord $urlRecord): void
    {
        if ($clicks) {
            $clicks->incrementClicksCount();
        } else {
            $clicks = ClicksFactory::CreateClick($urlRecord);
        }
        $this->entityManager->persist($clicks);
        $this->entityManager->flush();
    }
}
