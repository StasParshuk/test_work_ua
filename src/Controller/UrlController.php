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
use function Symfony\Component\Clock\now;

class UrlController extends AbstractController
{
    public function __construct(private ClicksRepository $clicksRepository,
                                private UrlRecordService$urlRecordService)
    {
    }

    #[Route('/{shortCode}', name: 'app_url')]
    public function index(UrlRecord $urlRecord): Response
    {
        if ($urlRecord->getExpirationTime() < now()){
          throw  $this->createNotFoundException("The link has expired");
        }
        /** @var null|Clicks $click */
        $click = $this->clicksRepository->GetByDateAndUrl($urlRecord,new DateTime);
        $this->urlRecordService->incrementClicksCount($click,$urlRecord);
        return $this->redirect($urlRecord->getOriginalUrl());
    }
}
