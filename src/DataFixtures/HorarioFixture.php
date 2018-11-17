<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use App\Entity\Horario;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HorarioFixture extends BaseFixture implements DependentFixtureInterface
{
    const COUNT = 5;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Horario::class, self::COUNT, function (Horario $horario, $count) {

            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');

            $horarioInicio = $this->faker->dateTimeInInterval("now", "+6 months");

            $horario
                ->setDiaSemana($this->faker->numberBetween(0, 7))
                ->setHorarioInicio($horarioInicio)
                ->setHorarioFim($this->faker->dateTimeInInterval($horarioInicio, "+2 hours"))
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
