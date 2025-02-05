<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;

//use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;

#[ORM\Entity(repositoryClass: OrganisationRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post(), 
        serializationContext: ['groups' : ['list_articles']]
    ]
    
)]
class Organisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ttile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTtile(): ?string
    {
        return $this->ttile;
    }

    public function setTtile(string $ttile): static
    {
        $this->ttile = $ttile;

        return $this;
    }
}
