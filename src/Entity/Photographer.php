<?php

namespace App\Entity;

use App\Repository\PhotographerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotographerRepository::class)]
class Photographer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\Column(length: 100)]
    private ?string $location = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 1)]
    private ?string $rate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bio = null;

    #[ORM\OneToMany(mappedBy: 'photographer', targetEntity: Portfolio::class, orphanRemoval: true)]
    private Collection $portfolios;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $facePhoto = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $favouritePhoto = null;

    public function __construct()
    {
        $this->portfolios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(string $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return Collection<int, Portfolio>
     */
    public function getPortfolios(): Collection
    {
        return $this->portfolios;
    }

    public function addPortfolio(Portfolio $portfolio): static
    {
        if (!$this->portfolios->contains($portfolio)) {
            $this->portfolios->add($portfolio);
            $portfolio->setPhotographer($this);
        }

        return $this;
    }

    public function removePortfolio(Portfolio $portfolio): static
    {
        if ($this->portfolios->removeElement($portfolio)) {
            // set the owning side to null (unless already changed)
            if ($portfolio->getPhotographer() === $this) {
                $portfolio->setPhotographer(null);
            }
        }

        return $this;
    }

    public function getFacePhoto(): ?string
    {
        return $this->facePhoto;
    }

    public function setFacePhoto(?string $facePhoto): static
    {
        $this->facePhoto = $facePhoto;

        return $this;
    }

    public function getFavouritePhoto(): ?string
    {
        return $this->favouritePhoto;
    }

    public function setFavouritePhoto(?string $favouritePhoto): static
    {
        $this->favouritePhoto = $favouritePhoto;

        return $this;
    }
}
