<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\Mapping\ClassMetadata;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;


use Vich\UploaderBundle\Mapping\Annotation as Vich;
//use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping\MappingException as ORMMappingException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Persistence\Mapping\MappingException as PersistenceMappingException;


#[ORM\Entity(repositoryClass: EmployeRepository::class)]
#[Vich\Uploadable]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class Employe implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['employe'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
        #[Assert\NotBlank(message:'ce champ ne peut pas être vide') ]
    #[Assert\Length(
        min: 3,
        max: 25,
        minMessage: 'taille minimale est  {{ limit }} characters',
        maxMessage: 'la taille maximale est de  {{ limit }} characters',
    )]
    #[Groups(['employe'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
        #[Assert\NotBlank(message:'ce champ ne peut pas être vide') ]
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: 'taille minimale est  {{ limit }} characters',
        maxMessage: 'la taille maximale est de  {{ limit }} characters',
    )]
    #[Groups(['employe'])]
    private ?string $prenom = null;

    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'imageName')]
    #[Groups(['employe'])]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['employe'])]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['employe'])]
    private ?\DateTimeImmutable $updatedAt = null;
    
    #[ORM\Column]
    #[Groups(['employe'])]
    private ?\DateTimeImmutable $createdAt = null;


    //UserInteface && Authentication
    #[ORM\Column(length: 255)]
    #[Groups(['employe'])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    #[Groups(['employe'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['employe'])]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Groups(['employe'])]
    private ?string $username = null;



    /**
     * @var Collection<int, Article>
     */
    #[ORM\OneToMany(targetEntity : Article::class, mappedBy: 'employe', orphanRemoval: true)]
    private Collection $articles;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'employe')]
    private Collection $clients;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Directeur $directeur = null;

    #[ORM\ManyToOne(inversedBy: 'employe')]
    private ?Agence $agence = null;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    
    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setEmploye($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getEmploye() === $this) {
                $article->setEmploye(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setEmploye($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getEmploye() === $this) {
                $client->setEmploye(null);
            }
        }

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

    public function __toString()
    {
        return $this->getNom();
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): static
    {
        $this->agence = $agence;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    /**
     *  Security 
     * 
    */
    
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }
    
}