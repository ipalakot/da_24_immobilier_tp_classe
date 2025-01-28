<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SiegeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\Mapping\ClassMetadata;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\MappingException as ORMMappingException;
use Doctrine\Persistence\Mapping\MappingException as PersistenceMappingException;



#[ORM\Entity(repositoryClass: SiegeRepository::class)]
class Siege
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['siege'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:'ce champ ne peut pas être vide') ]
    #[Assert\Length(
        min: 2,
        max: 25,
        minMessage: 'taille minimale est  {{ limit }} characters',
        maxMessage: 'la taille maximale est de  {{ limit }} characters',
    )]
    #[Groups(['siege'])]
    private ?float $capital = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'ce champ ne peut pas être vide') ]
    #[Assert\Length(
        min: 3,
        max: 25,
        minMessage: 'taille minimale est  {{ limit }} characters',
        maxMessage: 'la taille maximale est de  {{ limit }} characters',
    )]
    #[Groups(['siege'])]
    private ?string $nom = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'ce champ ne peut pas être vide') ]
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: 'taille minimale est  {{ limit }} characters',
        maxMessage: 'la taille maximale est de  {{ limit }} characters',)]
        #[Groups(['siege'])]
    private ?string $adresse = null;


    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Directeur $directeur = null;

    /**
     * @var Collection<int, Agence>
     */
    #[ORM\OneToMany(targetEntity: Agence::class, mappedBy: 'siege')]
    private Collection $agences;

    public function __construct()
    {
        $this->agences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapital(): ?float
    {
        return $this->capital;
    }

    public function setCapital(float $capital): static
    {
        $this->capital = $capital;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDirecteur(): ?Directeur
    {
        return $this->directeur;
    }

    public function setDirecteur(?Directeur $directeur): static
    {
        $this->directeur = $directeur;

        return $this;
    }

    /**
     * @return Collection<int, Agence>
     */
    public function getAgences(): Collection
    {
        return $this->agences;
    }

    public function addAgence(Agence $agence): static
    {
        if (!$this->agences->contains($agence)) {
            $this->agences->add($agence);
            $agence->setSiege($this);
        }

        return $this;
    }

    public function removeAgence(Agence $agence): static
    {
        if ($this->agences->removeElement($agence)) {
            // set the owning side to null (unless already changed)
            if ($agence->getSiege() === $this) {
                $agence->setSiege(null);
            }
        }

        return $this;
    }
}
