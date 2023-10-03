<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ApiResource]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $price_buy = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $transaction_date = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?nft $nft_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceBuy(): ?float
    {
        return $this->price_buy;
    }

    public function setPriceBuy(float $price_buy): static
    {
        $this->price_buy = $price_buy;

        return $this;
    }

    public function getTransactionDate(): ?\DateTimeInterface
    {
        return $this->transaction_date;
    }

    public function setTransactionDate(\DateTimeInterface $transaction_date): static
    {
        $this->transaction_date = $transaction_date;

        return $this;
    }

    public function getNftId(): ?nft
    {
        return $this->nft_id;
    }

    public function setNftId(?nft $nft_id): static
    {
        $this->nft_id = $nft_id;

        return $this;
    }
}
