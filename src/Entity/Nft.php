<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\NftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NftRepository::class)]
#[ApiFilter(BooleanFilter::class, properties: ['on_sale'])]
#[ApiFilter(SearchFilter::class, properties: ['nftgallery' => 'exact', 'name' => 'partial'])]
#[ApiFilter(DateFilter::class, properties: ['mintdate'])]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('ROLE_USER')"),
    new Patch(security: "is_granted('ROLE_ADMIN') or object.creator == user"),
    new Delete(security: "is_granted('ROLE_ADMIN') or object.creator == user"),
    ],
    normalizationContext: ['groups'=>["nfts:read"]],
    denormalizationContext: ['groups'=>["nfts:write"]],
)]

class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["nfts:read","transactions:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["nfts:read","nfts:write","transactions:read"])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(["nfts:read","nfts:write"])]
    private ?string $image = null;

    #[ORM\Column]
    #[Groups(["nfts:read"])]
    private ?float $price = null;

    #[ORM\ManyToOne(targetEntity: Gallery::class, inversedBy: 'nfts')]
    #[Groups(["nfts:read","nfts:write"])]
    private ?Gallery $nftgallery = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(["nfts:read"])]
    private ?\DateTimeInterface $mintdate = null;

    #[ORM\Column]
    #[Groups(["nfts:read"])]
    private ?bool $on_sale = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nfts')]
    #[Groups(["nfts:read","nfts:write"])]
    private ?User $owner = null;

    #[ORM\OneToMany(mappedBy: 'nft_id', targetEntity: Transaction::class)]
    #[Groups(["nfts:read"])]
    private Collection $transactions;

    public function __construct()
    {
        $this->mintdate = new \DateTime();
        $this->on_sale = false;
        $this->transactions = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): static
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions->add($transaction);
            $transaction->setNftId($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): static
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getNftId() === $this) {
                $transaction->setNftId(null);
            }
        }

        return $this;
    }
}
