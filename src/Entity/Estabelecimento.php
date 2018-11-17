<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstabelecimentoRepository")
 * @ApiResource(
 *     normalizationContext={"groups": {"estabelecimento_read"}},
 *     denormalizationContext={"groups": {"estabelecimento_write", "usuario_write"}}
 * )
 */
class Estabelecimento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups({"estabelecimento_read", "estabelecimento_write", "usuario_write"})
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups({"estabelecimento_read", "estabelecimento_write", "usuario_write"})
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank()
     * @Groups({"estabelecimento_read", "estabelecimento_write", "usuario_write"})
     */
    private $telefone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }
}
