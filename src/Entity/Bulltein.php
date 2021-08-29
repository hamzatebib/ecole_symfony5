<?php

namespace App\Entity;

use App\Repository\BullteinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BullteinRepository::class)
 */
class Bulltein
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $semestre;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class)
     */
    private $eleve_id;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
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

    public function getClasseId(): ?Classe
    {
        return $this->classe_id;
    }

    public function setClasseId(?Classe $classe_id): self
    {
        $this->classe_id = $classe_id;

        return $this;
    }
}
