<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Invite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        for ($i=0; $i < 10; $i++) {
            $user = new User();
            $user->setName($this->faker->name);
            for ($j=0; $j < rand(1,5); $j++) {
                $invite = new Invite();
                $invite->setStatus('pending');
                $invite->setSender($user);
                $invite->setReciever($user);
            }
            $manager->persist($invite);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
