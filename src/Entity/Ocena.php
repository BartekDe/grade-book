<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OcenaRepository")
 */
class Ocena
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
    private $ocena;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $przedmiot;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Uczen", inversedBy="oceny")
     * @ORM\JoinColumn(nullable=false)
     */
    private $uczen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOcena(): ?int
    {
        return $this->ocena;
    }

    public function setOcena(int $ocena): self
    {
        $this->ocena = $ocena;

        return $this;
    }

    public function getPrzedmiot(): ?string
    {
        return $this->przedmiot;
    }

    public function setPrzedmiot(string $przedmiot): self
    {
        $this->przedmiot = $przedmiot;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getUczen(): ?Uczen
    {
        return $this->uczen;
    }

    public function setUczen(?Uczen $uczen): self
    {
        $this->uczen = $uczen;

        return $this;
    }
}
