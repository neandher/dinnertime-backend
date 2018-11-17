<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use App\Entity\Estabelecimento;
use App\Entity\Mesa;
use App\Entity\Reserva;
use App\Entity\TipoReserva;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ReservaFixture extends BaseFixture implements DependentFixtureInterface
{
    const COUNT = 5;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Reserva::class, self::COUNT, function (Reserva $reserva, $count) {

            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');

            /** @var TipoReserva $tipoReserva */
            $tipoReserva = $this->getReference(TipoReserva::class . '_' . $this->faker->numberBetween(1, TipoReservaFixture::COUNT));

            /** @var Cliente $cliente */
            $cliente = $this->getReference(Cliente::class . '_' . $this->faker->numberBetween(1, ClienteFixture::COUNT));

            /** @var Mesa $mesa */
            $mesa = $this->getReference(Mesa::class . '_' . $this->faker->numberBetween(1, MesaFixture::COUNT));

            $reserva
                ->setDatahora($this->faker->dateTimeInInterval("now", "+6 months"))
                ->setSituacao($this->faker->randomElement(Reserva::$situacoes))
                ->setCliente($cliente)
                ->setTipoReserva($tipoReserva)
                ->addMesa($mesa)
                ->setEstabelecimento($estabelecimento);
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            EstabelecimentoFixture::class,
            MesaFixture::class,
            ClienteFixture::class,
            TipoReservaFixture::class
        ];
    }
}
