<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\OpenApi\Model;
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
#[ApiFilter(RangeFilter::class, properties: ['price'])]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('IS_AUTHENTICATED_FULLY')"),
    new Patch(security: "is_granted('ROLE_ADMIN') or object.owner == user"),
    new Delete(security: "is_granted('ROLE_ADMIN') or object.owner == user"),

    new Post(uriTemplate: 'api/nft/{id}/sell', routeName: 'app_nft_sell', name: 'app_nft_sell',),
    new Get(uriTemplate: 'api/nft/{id}/buy', routeName: 'app_nft_buy', name: 'app_nft_buy',),
    new Get(uriTemplate: 'api/nft/{id}/cancel_order', routeName: 'app_nft_cancel_order', name: 'app_nft_cancel_order',),
],
    normalizationContext: ['groups' => ["nfts:read"]],
    denormalizationContext: ['groups' => ["nfts:write"]],
)]
#[ORM\HasLifecycleCallbacks]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["nfts:read","transactions:read",'user:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["nfts:read", "nfts:write", "transactions:read",'user:read'])]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: Gallery::class, inversedBy: 'nfts')]
    #[Groups(["nfts:read", "nfts:write"])]
    private ?Gallery $nftgallery = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(["nfts:read"])]
    private ?\DateTimeInterface $mintdate = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nfts')]
    #[Groups(["nfts:read", "nfts:write",'user:read'])]
    public ?User $owner = null;

    /**
     * @OneToMany(targetEntity="Transaction", mappedBy="nft_id", cascade={"remove"})
     */
    #[Groups(["nfts:read"])]
    private Collection $transactions;

    #[ORM\ManyToOne(targetEntity: Image::class)]
    #[ApiProperty(types: ['https://schema.org/image'])]
    #[Groups(["nfts:write","nfts:read",'user:read'])]
    private ?Image $image = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups(["nfts:read",'user:read'])]
    private ?Transaction $currentOrder = null;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    #[ORM\PrePersist()]
    public function presetData(): void
    {
        $this->owner = $this->getNftgallery()->getCreator();
        $this->mintdate = new \DateTime();
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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(Image $image): static
    {
        $this->image = $image;

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

    public function getCurrentOrder(): ?Transaction
    {
        return $this->currentOrder;
    }

    public function setCurrentOrder(?Transaction $currentOrder): static
    {
        $this->currentOrder = $currentOrder;

        return $this;
    }


}
