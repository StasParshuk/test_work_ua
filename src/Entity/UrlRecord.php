<?php

namespace App\Entity;

use App\Repository\UrlRecordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UrlRecordRepository::class)]
#[UniqueEntity(fields: ['shortCode'], message: 'Short Code Unique')]
class UrlRecord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2048)]
    #[Assert\NotBlank]
    #[Assert\Length(min: '7', max: 2048, minMessage: 'Url too short content', maxMessage: 'Url too long')]
    #[Assert\Url(message: 'Url not valid')]
    private ?string $originalUrl = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: '1', max: 255, minMessage: 'Short Code too short content', maxMessage: 'Short Code too long')]
    private ?string $shortCode = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank]
    private ?\DateTimeInterface $expirationTime = null;

    #[ORM\OneToMany(mappedBy: 'urlRecord', targetEntity: Clicks::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $clicks;

    public function __construct()
    {
        $this->clicks = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(string $originalUrl): static
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }

    public function getShortCode(): ?string
    {
        return $this->shortCode;
    }

    public function setShortCode(string $shortCode): static
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    public function getExpirationTime(): ?\DateTimeInterface
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(\DateTimeInterface $expirationTime): static
    {
        $this->expirationTime = $expirationTime;

        return $this;
    }

    /**
     * @return Collection<int, Clicks>
     */
    public function getClicks(): Collection
    {
        return $this->clicks;
    }

    public function addClick(Clicks $click): static
    {
        if (!$this->clicks->contains($click)) {
            $this->clicks->add($click);
            $click->setUrlRecord($this);
        }

        return $this;
    }

    public function removeClick(Clicks $click): static
    {
        if ($this->clicks->removeElement($click)) {
            // set the owning side to null (unless already changed)
            if ($click->getUrlRecord() === $this) {
                $click->setUrlRecord(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->shortCode ?? 'Not Found';
    }
}
