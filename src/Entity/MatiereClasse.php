<?php

namespace App\Entity;

use App\Repository\MatiereClasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereClasseRepository::class)
 */
class MatiereClasse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="matiere_id")
     */
    private $matiere_id;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $classe_id;

    public function getId(): ?int
    {
        return $this->id;
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
