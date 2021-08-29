<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $coeficient;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $semestre;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class)
     */
    private $eleve_id;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     */
    private $matiere_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $observations;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe_id;

    public function getId(): ?int
    { //lllfjjjjjffffff
        return $this->id;
    }

    public function getCoeficient(): ?float
    {
        return $this->coeficient;
    }

    public function setCoeficient(float $coeficient): self
    {
        $this->coeficient = $coeficient;

        return $this;
    }

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getSemestre(): ?int
    {
        return $this->semestre;
    }

    public function setSemestre(int $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getEleveId(): ?eleve
    {
        return $this->eleve_id;
    }

    public function setEleveId(?eleve $eleve_id): self
    {
        $this->eleve_id = $eleve_id;

        return $this;
    }

    public function getMatiereId(): ?matiere
    {
        return $this->matiere_id;
    }

    public function setMatiereId(?matiere $matiere_id): self
    {
        $this->matiere_id = $matiere_id;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): self
    {
        $this->observations = $observations;

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
}
