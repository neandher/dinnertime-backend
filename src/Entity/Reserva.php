<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ReservaRepository")
 */
class Reserva
{
    const SITUACAO_NOVA = 'nova';
    const SITUACAO_FECHADA = 'fechada';
    const SITUACAO_CANCELADA = 'cancelada';

    public static $situacoes = [
        self::SITUACAO_NOVA,
        self::SITUACAO_FECHADA,
        self::SITUACAO_CANCELADA,
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datahora;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $situacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoReserva")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoReserva;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estabelecimento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estabelecimento;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mesa")
     */
    private $mesas;

    public function __construct()
    {
        $this->mesas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatahora(): ?\DateTimeInterface
    {
        return $this->datahora;
    }

    public function setDatahora(\DateTimeInterface $datahora): self
    {
        $this->datahora = $datahora;

        return $this;
    }

    public function getSituacao(): ?string
    {
        return $this->situacao;
    }

    public function setSituacao(string $situacao): self
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getTipoReserva(): ?TipoReserva
    {
        return $this->tipoReserva;
    }

    public function setTipoReserva(?TipoReserva $tipoReserva): self
    {
        $this->tipoReserva = $tipoReserva;

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

    /**
     * @return Collection|Mesa[]
     */
    public function getMesas(): Collection
    {
        return $this->mesas;
    }

    public function addMesa(Mesa $mesa): self
    {
        if (!$this->mesas->contains($mesa)) {
            $this->mesas[] = $mesa;
        }

        return $this;
    }

    public function removeMesa(Mesa $mesa): self
    {
        if ($this->mesas->contains($mesa)) {
            $this->mesas->removeElement($mesa);
        }

        return $this;
    }
}
