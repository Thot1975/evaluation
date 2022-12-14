<?php

namespace App\Entity;

use App\Repository\ComputerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerRepository::class)]
class Computer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $model = null;

    #[ORM\OneToMany(mappedBy: 'computer', targetEntity: Brand::class)]
    private Collection $marque;

    #[ORM\OneToMany(mappedBy: 'computer', targetEntity: User::class)]
    private Collection $author;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ref = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgfile = null;

    public function __construct()
    {
        $this->marque = new ArrayCollection();
        $this->author = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection<int, Brand>
     */
    public function getMarque(): Collection
    {
        return $this->marque;
    }

    public function addMarque(Brand $marque): self
    {
        if (!$this->marque->contains($marque)) {
            $this->marque->add($marque);
            $marque->setComputer($this);
        }

        return $this;
    }

    public function removeMarque(Brand $marque): self
    {
        if ($this->marque->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getComputer() === $this) {
                $marque->setComputer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(User $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author->add($author);
            $author->setComputer($this);
        }

        return $this;
    }

    public function removeAuthor(User $author): self
    {
        if ($this->author->removeElement($author)) {
            // set the owning side to null (unless already changed)
            if ($author->getComputer() === $this) {
                $author->setComputer(null);
            }
        }

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getImgfile(): ?string
    {
        return $this->imgfile;
    }

    public function setImgfile(?string $imgfile): self
    {
        $this->imgfile = $imgfile;

        return $this;
    }
}
