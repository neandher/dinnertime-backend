<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use Doctrine\Common\Persistence\ObjectManager;

class ClienteFixture extends BaseFixture
{
    const COUNT = 5;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Cliente::class, self::COUNT, function (Cliente $cliente, $count) {
            $cliente
                ->setNome($this->faker->name)
                ->setEmail($this->faker->email)
                ->setTelefone($this->faker->phoneNumber);
        });

        $manager->flush();
    }

}
