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

		$actor2 = new Actor();
		$actor2->setName('Robert Downey Jr.');
		$manager->persist($actor2);

		$actor3 = new Actor();
		$actor3->setName('Morgan Freeman');
		$manager->persist($actor3);

		
		$actor4 = new Actor();
		$actor4->setName('Denzel Washington');
		$manager->persist($actor4);

		$manager->flush();

		$this->addReference('actor1', $actor1);
		$this->addReference('actor2', $actor2);
		$this->addReference('actor3', $actor3);
		$this->addReference('actor4', $actor4);

		
	}
}
