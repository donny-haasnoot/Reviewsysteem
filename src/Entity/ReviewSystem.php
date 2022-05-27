<?php

namespace App\Entity;

use App\Repository\ReviewSystemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewSystemRepository::class)]
class ReviewSystem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $Naam;

    #[ORM\Column(type: 'integer')]
    private $Sterren;

    #[ORM\Column(type: 'string', length: 100)]
    private $Beschrijving;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setID(int $ID): self
    {
        $this->ID = $ID;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getSterren(): ?int
    {
        return $this->Sterren;
    }

    public function setSterren(int $Sterren): self
    {
        $this->Sterren = $Sterren;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->Beschrijving;
    }

    public function setBeschrijving(string $Beschrijving): self
    {
        $this->Beschrijving = $Beschrijving;

        return $this;
    }
}
