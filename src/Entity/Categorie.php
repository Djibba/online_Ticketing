<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $nomCategorie;

    /**
     * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="categorie")
     */
    private $evenements;

    /**
     * @ORM\OneToMany(targetEntity=Billeterie::class, mappedBy="categorieBilleterie")
     */
    private $billeteries;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->billeteries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->setCategorie($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getCategorie() === $this) {
                $evenement->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNomCategorie();
    }

    /**
     * @return Collection|Billeterie[]
     */
    public function getBilleteries(): Collection
    {
        return $this->billeteries;
    }

    public function addBilletery(Billeterie $billetery): self
    {
        if (!$this->billeteries->contains($billetery)) {
            $this->billeteries[] = $billetery;
            $billetery->setCategorieBilleterie($this);
        }

        return $this;
    }

    public function removeBilletery(Billeterie $billetery): self
    {
        if ($this->billeteries->removeElement($billetery)) {
            // set the owning side to null (unless already changed)
            if ($billetery->getCategorieBilleterie() === $this) {
                $billetery->setCategorieBilleterie(null);
            }
        }

        return $this;
    }
}
