<?php

namespace App\Entity;

use App\Repository\AuthorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorsRepository::class)
 */
class Authors
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="integer")
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $death;

    /**
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @ORM\OneToMany(targetEntity=Books::class, mappedBy="authorId")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->BirthDate = 0;
        $this->death = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?int
    {
        return $this->BirthDate;
    }

    public function setBirthDate(int $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getDeath(): ?int
    {
        return $this->death;
    }

    public function setDeath(int $death): self
    {
        $this->death = $death;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Collection|Books[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Books $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setAuthorId($this);
        }

        return $this;
    }

    public function removeBook(Books $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getAuthorId() === $this) {
                $book->setAuthorId(0);
            }
        }

        return $this;
    }

}
