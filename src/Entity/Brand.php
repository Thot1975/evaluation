<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'marque')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Computer $computer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getComputer(): ?Computer
    {
        return $this->computer;
    }

    public function setComputer(?Computer $computer): self
    {
        $this->computer = $computer;

        return $this;
    }
}
