<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HorarioRepository")
 */
class Horario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $diaSemana;

    /**
     * @ORM\Column(type="time")
     */
    private $horarioInicio;

    /**
     * @ORM\Column(type="time")
     */
    private $horarioFim;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estabelecimento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estabelecimento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiaSemana(): ?int
    {
        return $this->diaSemana;
    }

    public function setDiaSemana(int $diaSemana): self
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }

    public function getHorarioInicio(): ?\DateTimeInterface
    {
        return $this->horarioInicio;
    }

    public function setHorarioInicio(\DateTimeInterface $horarioInicio): self
    {
        $this->horarioInicio = $horarioInicio;

        return $this;
    }

    public function getHorarioFim(): ?\DateTimeInterface
    {
        return $this->horarioFim;
    }

    public function setHorarioFim(\DateTimeInterface $horarioFim): self
    {
        $this->horarioFim = $horarioFim;

        return $this;
    }

    public function getEstabelecimento(): ?Estabelecimento
    {
        return $this->estabelecimento;
    }

    public function setEstabelecimento(?Estabelecimento $estabelecimento): self
    {
        $this->estabelecimento = $estabelecimento;

        return $this;
    }
}
