<?php

namespace App\Controller;

use App\Entity\UrlRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UrlController extends AbstractController
{
    #[Route('/{shortCode}', name: 'app_url')]
    public function index(UrlRecord $urlRecord): Response
    {
        return $this->redirect($urlRecord->getOriginalUrl());
    }
}
