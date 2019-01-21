<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UczenRepository")
 */
class Uczen implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Imie;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Nazwisko;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Klasa;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ocena", mappedBy="uczen", orphanRemoval=true)
     */
    private $oceny;

    public function __construct()
    {
        $this->oceny = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_STUDENT';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getImie(): ?string
    {
        return $this->Imie;
    }

    public function setImie(string $Imie): self
    {
        $this->Imie = $Imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->Nazwisko;
    }

    public function setNazwisko(string $Nazwisko): self
    {
        $this->Nazwisko = $Nazwisko;

        return $this;
    }

    public function getKlasa(): ?string
    {
        return $this->Klasa;
    }

    public function setKlasa(string $Klasa): self
    {
        $this->Klasa = $Klasa;

        return $this;
    }

    /**
     * @return Collection|Ocena[]
     */
    public function getOceny(): Collection
    {
        return $this->oceny;
    }

    public function addOceny(Ocena $oceny): self
    {
        if (!$this->oceny->contains($oceny)) {
            $this->oceny[] = $oceny;
            $oceny->setUczen($this);
        }

        return $this;
    }

    public function removeOceny(Ocena $oceny): self
    {
        if ($this->oceny->contains($oceny)) {
            $this->oceny->removeElement($oceny);
            // set the owning side to null (unless already changed)
            if ($oceny->getUczen() === $this) {
                $oceny->setUczen(null);
            }
        }

        return $this;
    }
}
