<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use App\Entity\TipoReserva;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TipoReservaFixture extends BaseFixture implements DependentFixtureInterface
{
    const COUNT = 5;

    private static $titles = [
        'Jantar',
        'Aniversário',
        'Comemoração Casual',
        'Romântico',
        'Simples',
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(TipoReserva::class, self::COUNT, function (TipoReserva $tipoReserva, $count) {
            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');
            $tipoReserva
                ->setDescricao(self::$titles[$this->faker->numberBetween(0, count(self::$titles))])
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
            EstabelecimentoFixture::class
        ];
    }
}
