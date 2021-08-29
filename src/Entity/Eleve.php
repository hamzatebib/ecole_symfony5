<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneEleve;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateinscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageeleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomPrenomMere;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephoneEleve(): ?int
    {
        return $this->telephoneEleve;
    }

    public function setTelephoneEleve(int $telephoneEleve): self
    {
        $this->telephoneEleve = $telephoneEleve;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getDateinscription(): ?\DateTimeInterface
    {
        return $this->dateinscription;
    }

    public function setDateinscription(\DateTimeInterface $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getImageeleve(): ?string
    {
        return $this->imageeleve;
    }

    public function setImageeleve(string $imageeleve): self
    {
        $this->imageeleve = $imageeleve;

        return $this;
    }

    public function getNomPrenomMere(): ?string
    {
        return $this->NomPrenomMere;
    }

    public function setNomPrenomMere(string $NomPrenomMere): self
    {
        $this->NomPrenomMere = $NomPrenomMere;

        return $this;
    }

    public function getClasseId(): ?classe
    {
        return $this->classe_id;
    }

    public function setClasseId(?classe $classe_id): self
    {
        $this->classe_id = $classe_id;

        return $this;
    }
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->nom;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
