<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $base_price = null;

    #[ORM\Column]
    private ?float $max_guests = null;

    #[ORM\Column]
    private ?float $bed_count = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $created_at = null;

    #[ORM\Column]
    private ?int $active = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?User $user_created = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?RoomStatus $status = null;

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

    public function getBasePrice(): ?float
    {
        return $this->base_price;
    }

    public function setBasePrice(float $base_price): static
    {
        $this->base_price = $base_price;

        return $this;
    }

    public function getMaxGuests(): ?float
    {
        return $this->max_guests;
    }

    public function setMaxGuests(float $max_guests): static
    {
        $this->max_guests = $max_guests;

        return $this;
    }

    public function getBedCount(): ?float
    {
        return $this->bed_count;
    }

    public function setBedCount(float $bed_count): static
    {
        $this->bed_count = $bed_count;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->user_created;
    }

    public function setUserCreated(?User $user_created): static
    {
        $this->user_created = $user_created;

        return $this;
    }

    public function getStatus(): ?RoomStatus
    {
        return $this->status;
    }

    public function setStatus(?RoomStatus $status): static
    {
        $this->status = $status;

        return $this;
    }
}
