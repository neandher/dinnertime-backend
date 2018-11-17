<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use App\Entity\LocalMesa;
use App\Entity\Mesa;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MesaFixture extends BaseFixture implements DependentFixtureInterface
{
    const COUNT = 5;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Mesa::class, self::COUNT, function (Mesa $mesa, $count) {

            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');

            /** @var LocalMesa $localMesa */
            $localMesa = $this->getReference(LocalMesa::class . '_' . $this->faker->numberBetween(1, LocalMesaFixture::COUNT));

            $mesa
                ->setNumero($this->faker->randomNumber(2))
                ->setQtLugares($this->faker->randomNumber(1))
                ->setLocalMesa($localMesa)
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
            LocalMesaFixture::class
        ];
    }
}
