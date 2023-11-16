<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GalleryRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(security: "is_granted('ROLE_USER')"),
    new Patch(security: "is_granted('ROLE_ADMIN') or object.creator == user"),
    new Delete(security: "is_granted('ROLE_ADMIN') or object.creator == user")],
    normalizationContext: ['groups'=>["galleries:read"]],
    denormalizationContext: ['groups'=>["galleries:write"]]
)]
class Gallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["galleries:read", "nfts:read", "user:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["galleries:read","galleries:write","nfts:read", "user:read"])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(["galleries:read","galleries:write", "nfts:read", "user:read"])]
    private ?string $description = null;

    #[ORM\Column(length: 255,nullable: true)]
    #[Groups(["galleries:read", "user:read","galleries:write"])]
    private ?string $category = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'galleries')]
    #[Groups(["galleries:read","nfts:read","galleries:write"])]
    public ?User $creator = null;

    #[ORM\OneToMany(mappedBy: 'nftgallery', targetEntity: Nft::class)]
    #[Groups(["user:read"])]
    private Collection $nfts;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(["galleries:read","galleries:write"])]
    private ?\DateTimeInterface $dropdate = null;

    #[ORM\ManyToOne(targetEntity: Image::class)]
    #[ApiProperty(types: ['https://schema.org/image'])]
    #[Groups(["galleries:read","galleries:write","nfts:read","user:read"])]
    private ?Image $image = null;

    #[ORM\ManyToOne(targetEntity: Image::class)]
    #[ApiProperty(types: ['https://schema.org/image'])]
    #[Groups(["galleries:read","galleries:write","nfts:read"])]
    private ?Image $bannerImage = null;

    public function __construct()
    {
        $this->nfts = new ArrayCollection();
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


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): static
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @return Collection<int, Nft>
     */
    public function getNfts(): Collection
    {
        return $this->nfts;
    }

    public function addNft(Nft $nft): static
    {
        if (!$this->nfts->contains($nft)) {
            $this->nfts->add($nft);
            $nft->setNftgallery($this);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        if ($this->nfts->removeElement($nft)) {
            // set the owning side to null (unless already changed)
            if ($nft->getNftgallery() === $this) {
                $nft->setNftgallery(null);
            }
        }

        return $this;
    }

    public function getDropdate(): ?\DateTimeInterface
    {
        return $this->dropdate;
    }

    public function setDropdate(\DateTimeInterface $dropdate): static
    {
        $this->dropdate = $dropdate;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    public function getBannerImage(): ?Image
    {
        return $this->bannerImage;
    }

    public function setBannerImage(?Image $bannerImage): void
    {
        $this->bannerImage = $bannerImage;
    }

}
