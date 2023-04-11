<?php

namespace App\Entity;

use App\Repository\SessionQuestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionQuestRepository::class)]
class SessionQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEnding = null;

    #[ORM\Column]
    private ?bool $unlocked = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne]
    private ?Status $Status = null;

    #[ORM\ManyToOne]
    private ?Quest $Quest = null;

    #[ORM\ManyToOne]
    private ?Session $Session = null;

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

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(?\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnding(): ?\DateTimeInterface
    {
        return $this->dateEnding;
    }

    public function setDateEnding(?\DateTimeInterface $dateEnding): self
    {
        $this->dateEnding = $dateEnding;

        return $this;
    }

    public function isUnlocked(): ?bool
    {
        return $this->unlocked;
    }

    public function setUnlocked(bool $unlocked): self
    {
        $this->unlocked = $unlocked;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->Status;
    }

    public function setStatus(?Status $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->Quest;
    }

    public function setQuest(?Quest $Quest): self
    {
        $this->Quest = $Quest;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->Session;
    }

    public function setSession(?Session $Session): self
    {
        $this->Session = $Session;

        return $this;
    }
}
