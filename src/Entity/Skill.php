<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $level = null;

    #[ORM\Column(nullable: true)]
    private ?bool $unlocked = null;

    #[ORM\Column(length: 255)]
    private ?string $notes = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $characterr = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SkillCategory $category = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function isUnlocked(): ?bool
    {
        return $this->unlocked;
    }

    public function setUnlocked(?bool $unlocked): self
    {
        $this->unlocked = $unlocked;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCharacterr(): ?Character
    {
        return $this->characterr;
    }

    public function setCharacterr(?Character $characterr): self
    {
        $this->characterr = $characterr;

        return $this;
    }

    public function getCategory(): ?SkillCategory
    {
        return $this->category;
    }

    public function setCategory(?SkillCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
