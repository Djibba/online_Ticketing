<?php

namespace App\Entity;

use App\Repository\BilleterieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilleterieRepository::class)
 */
class Billeterie
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
    private $nomBilleterie;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="billeteries")
     */
    private $categorieBilleterie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBilleterie(): ?string
    {
        return $this->nomBilleterie;
    }

    public function setNomBilleterie(string $nomBilleterie): self
    {
        $this->nomBilleterie = $nomBilleterie;

        return $this;
    }

    public function getCategorieBilleterie(): ?Categorie
    {
        return $this->categorieBilleterie;
    }

    public function setCategorieBilleterie(?Categorie $categorieBilleterie): self
    {
        $this->categorieBilleterie = $categorieBilleterie;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }
}
