<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('ROLE_USER')"),
    new Patch(security: "is_granted('ROLE_ADMIN')"),
    new Delete(security: "is_granted('ROLE_ADMIN')"),
],
    normalizationContext: ['groups'=>["transactions:read"]],
    denormalizationContext: ['groups'=>["transactions:write"]]
)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["transactions:read"])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(["transactions:read","transactions:write"])]
    private ?float $price_buy = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(["transactions:read"])]
    private ?\DateTimeInterface $transaction_date = null;

    #[ORM\ManyToOne(targetEntity: Nft::class, inversedBy: 'transactions')]
    #[Groups(["transactions:read","transactions:write"])]
    private ?Nft $nft_id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    #[Groups(["transactions:read","transactions:write"])]
    private ?User $user_seller_id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    #[Groups(["transactions:read","transactions:write"])]
    private ?User $user_buyer_id = null;

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

    public function getNftId(): ?Nft
    {
        return $this->nft_id;
    }

    public function setNftId(?Nft $nft_id): static
    {
        $this->nft_id = $nft_id;

        return $this;
    }

    public function getUserSellerId(): ?User
    {
        return $this->user_seller_id;
    }

    public function setUserSellerId(?User $user_seller_id): static
    {
        $this->user_seller_id = $user_seller_id;

        return $this;
    }

    public function getUserBuyerId(): ?User
    {
        return $this->user_buyer_id;
    }

    public function setUserBuyerId(?User $user_buyer_id): static
    {
        $this->user_buyer_id = $user_buyer_id;

        return $this;
    }
}
