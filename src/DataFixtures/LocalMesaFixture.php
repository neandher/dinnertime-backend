<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use App\Entity\LocalMesa;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LocalMesaFixture extends BaseFixture implements DependentFixtureInterface
{
    const COUNT = 5;

    private static $titles = [
        'Segundo Andar',
        'Primeiro Andar - Próximo a Janela',
        'Na entrada',
        'Nos Fundos',
        'Qualquer Local',
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(LocalMesa::class, self::COUNT, function (LocalMesa $localMesa, $count) {
            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');
            $localMesa
                ->setDescricao($this->faker->randomElement(self::$titles))
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
