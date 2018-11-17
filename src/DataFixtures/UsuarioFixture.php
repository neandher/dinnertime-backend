<?php

namespace App\DataFixtures;

use App\Entity\Estabelecimento;
use App\Entity\Usuario;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioFixture extends BaseFixture
{
    const COUNT = 5;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UsuarioFixture constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Usuario::class, self::COUNT, function (Usuario $usuario, $count) {

            /** @var Estabelecimento $estabelecimento */
            $estabelecimento = $this->getReference(Estabelecimento::class . '_1');

            $usuario
                ->setNome($this->faker->name)
                ->setEmail($this->faker->email)
                ->setPassword($this->encoder->encodePassword($usuario, '123'))
                ->setEstabelecimento($estabelecimento);
        });

        $manager->flush();
    }

}
