<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use Doctrine\Common\Persistence\ObjectManager;

class EstabelecimentoFixture extends BaseFixture
{
    const COUNT = 5;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Estabelecimento::class, self::COUNT, function (Estabelecimento $estabelecimento, $count) {
            $estabelecimento
                ->setNome($this->faker->company)
                ->setEndereco($this->faker->address)
                ->setTelefone($this->faker->phoneNumber);
        });

        $manager->flush();
    }

}
