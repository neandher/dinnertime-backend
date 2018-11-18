<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MesaRepository")
 */
class Mesa
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
    private $qtLugares;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LocalMesa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $localMesa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estabelecimento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estabelecimento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtLugares(): ?int
    {
        return $this->qtLugares;
    }

    public function setQtLugares(int $qtLugares): self
    {
        $this->qtLugares = $qtLugares;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getLocalMesa(): ?LocalMesa
    {
        return $this->localMesa;
    }

    public function setLocalMesa(?LocalMesa $localMesa): self
    {
        $this->localMesa = $localMesa;

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
