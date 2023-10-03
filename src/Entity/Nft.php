<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\NftRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NftRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('ROLE_USER')"),
    new Patch(security: "is_granted('ROLE_ADMIN') or object.creator == user"),
    new Delete(security: "is_granted('ROLE_ADMIN') or object.creator == user"),
])]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(targetEntity: Gallery::class, inversedBy: 'nfts')]
    private ?Gallery $nftgallery = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $mintdate = null;

    #[ORM\Column]
    private ?bool $on_sale = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nfts')]
    private ?user $owner = null;

    public function getId(): ?int

    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getNftgallery(): ?Gallery
    {
        return $this->nftgallery;
    }

    public function setNftgallery(?Gallery $nftgallery): static
    {
        $this->nftgallery = $nftgallery;

        return $this;
    }

    public function getMintdate(): ?\DateTimeInterface
    {
        return $this->mintdate;
    }

    public function setMintdate(\DateTimeInterface $mintdate): static
    {
        $this->mintdate = $mintdate;

        return $this;
    }

    public function isOnSale(): ?bool
    {
        return $this->on_sale;
    }

    public function setOnSale(bool $on_sale): static
    {
        $this->on_sale = $on_sale;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
