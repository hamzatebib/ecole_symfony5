<?php

namespace App\Entity;

use App\Repository\FichenoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichenoteRepository::class)
 */
class Fichenote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $semestre;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $prof_id;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe_id;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     */
    private $matiere_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

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

    public function getProfId(): ?User
    {
        return $this->prof_id;
    }

    public function setProfId(?User $prof_id): self
    {
        $this->prof_id = $prof_id;

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

    public function getMatiereId(): ?Matiere
    {
        return $this->matiere_id;
    }

    public function setMatiereId(?Matiere $matiere_id): self
    {
        $this->matiere_id = $matiere_id;

        return $this;
    }
}
