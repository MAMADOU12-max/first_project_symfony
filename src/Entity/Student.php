<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     */
    private $registration_number;

    /**
     * @ORM\Column(type="string", length=255 ) 
     *  @Assert\Length(
     *      min = 3,
     *      max = 15,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = true
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 3,
     *      max = 15,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = true
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $Email;

    /**
     * @ORM\Column(type="date")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $user_type;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fellow_price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="Room")
     */
    private $room;
 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registration_number;
    }

    public function setRegistrationNumber(string $registration_number): self
    {
        $this->registration_number = $registration_number;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->user_type;
    }

    public function setUserType(string $user_type): self
    {
        $this->user_type = $user_type;

        return $this;
    }

    public function getFellowPrice(): ?string
    {
        return $this->fellow_price;
    }

    public function setFellowPrice(?int $fellow_price): self
    {
        $this->fellow_price = $fellow_price;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }
}
