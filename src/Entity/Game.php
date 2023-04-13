<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $story = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $year = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Editor $editor = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Support::class)]
    private Collection $support;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $playedBy;

    #[ORM\Column]
    private ?bool $isFinished = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgAlt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgIllustration = null;

    public function __construct()
    {
        $this->support = new ArrayCollection();
        $this->playedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(?\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Support>
     */
    public function getSupport(): Collection
    {
        return $this->support;
    }

    public function addSupport(Support $support): self
    {
        if (!$this->support->contains($support)) {
            $this->support->add($support);
        }

        return $this;
    }

    public function removeSupport(Support $support): self
    {
        $this->support->removeElement($support);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPlayedBy(): Collection
    {
        return $this->playedBy;
    }

    public function addPlayedBy(User $playedBy): self
    {
        if (!$this->playedBy->contains($playedBy)) {
            $this->playedBy->add($playedBy);
        }

        return $this;
    }

    public function removePlayedBy(User $playedBy): self
    {
        $this->playedBy->removeElement($playedBy);

        return $this;
    }

    public function isIsFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function setIsFinished(bool $isFinished): self
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    public function getImgAlt(): ?string
    {
        return $this->imgAlt;
    }

    public function setImgAlt(?string $imgAlt): self
    {
        $this->imgAlt = $imgAlt;

        return $this;
    }

    public function getImgIllustration(): ?string
    {
        return $this->imgIllustration;
    }

    public function setImgIllustration(?string $imgIllustration): self
    {
        $this->imgIllustration = $imgIllustration;

        return $this;
    }
}
