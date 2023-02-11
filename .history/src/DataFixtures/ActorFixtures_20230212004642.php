<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor1 = new Actor();
        $actor1->setName('Tom Hanks');
        $manager->persist($actor1);

        $actor1 = new Actor();
        $actor1->setName('Tom Hanks');
        $manager->persist($actor1);

        

        $manager->flush();
    }
}
