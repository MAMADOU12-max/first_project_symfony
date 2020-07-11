<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_room;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_building;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="room")
     */
    private $Room;

    public function __construct()
    {
        $this->Room = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    // convert entity rule error 
    public function __toString()
    {
        return (string) $this->getId();
    }

    public function getNumberRoom(): ?int
    {
        return $this->number_room;
    }


    public function setNumberRoom(int $number_room): self
    {
        $this->number_room = $number_room;

        return $this;
    }

    public function getNumberBuilding(): ?int
    {
        return $this->number_building;
    }

    public function setNumberBuilding(int $number_building): self
    {
        $this->number_building = $number_building;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getRoom(): Collection
    {
        return $this->Room;
    }

    public function addRoom(Student $room): self
    {
        if (!$this->Room->contains($room)) {
            $this->Room[] = $room;
            $room->setRoom($this);
        }

        return $this;
    }

    public function removeRoom(Student $room): self
    {
        if ($this->Room->contains($room)) {
            $this->Room->removeElement($room);
            // set the owning side to null (unless already changed)
            if ($room->getRoom() === $this) {
                $room->setRoom(null);
            }
        }

        return $this;
    }
}
