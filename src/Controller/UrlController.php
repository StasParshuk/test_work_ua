<?php

namespace App\Controller;

use App\Entity\Clicks;
use App\Entity\UrlRecord;
use App\Repository\ClicksRepository;
use App\Service\UrlRecordService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UrlController extends AbstractController
{
    public function __construct(private ClicksRepository $clicksRepository,
                                private UrlRecordService$urlRecordService)
    {
    }

    #[Route('/{shortCode}', name: 'app_url')]
    public function index(UrlRecord $urlRecord): Response
    {
        /** @var null|Clicks $click */
        $click = $this->clicksRepository->GetByDateAndUrl($urlRecord,new DateTime);
        $this->urlRecordService->incrementClicksCount($click,$urlRecord);
        return $this->redirect($urlRecord->getOriginalUrl());
    }
}
