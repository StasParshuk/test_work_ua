<?php

namespace App\Entity;

use App\Repository\ClicksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClicksRepository::class)]
class Clicks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $CountClicks = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\ManyToOne(inversedBy: 'clicks')]
    private ?UrlRecord $urlRecord = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountClicks(): ?string
    {
        return $this->CountClicks;
    }

    public function setCountClicks(string $CountClicks): static
    {
        $this->CountClicks = $CountClicks;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getUrlRecord(): ?UrlRecord
    {
        return $this->urlRecord;
    }

    public function setUrlRecord(?UrlRecord $urlRecord): static
    {
        $this->urlRecord = $urlRecord;

        return $this;
    }
}
