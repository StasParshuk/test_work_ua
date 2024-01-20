<?php

namespace App\Factory;

use App\Entity\Clicks;
use App\Entity\UrlRecord;
use function Symfony\Component\Clock\now;

class ClicksFactory
{
    public static function CreateClick(UrlRecord $urlRecord): Clicks
    {
        $click = new Clicks();
        $click->setDate(now());
        $click->setCountClicks(1);
        $click->setUrlRecord($urlRecord);
        return $click;
    }
}
