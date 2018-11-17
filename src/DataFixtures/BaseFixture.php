<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class BaseFixture extends Fixture
{
    /** @var ObjectManager */
    private $manager;

    /** @var Generator */
    protected $faker;

    abstract protected function loadData(ObjectManager $manager);

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create();
        $this->loadData($manager);
    }

    protected function createMany(string $className, int $count, callable $factory)
    {
        $this->addProviders();

        for ($i = 1; $i <= $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);
            $this->manager->persist($entity);
            $this->addReference($className . '_' . $i, $entity);
        }
    }

    protected function addProviders()
    {
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Address($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\PhoneNumber($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Company($this->faker));
    }
}