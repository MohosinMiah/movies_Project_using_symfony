<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie1 = new Movie();
        $movie1->setTitle('The Shawshank Redemption');
        $movie1->setReleaseYear(1994);
        $movie1->setDescription("PHP has greatly evolved over the years as far as reusability is concerned. Since PHP5, the object implementation is much better, and when traits will be supported in the next version of the language, we will have a solid general purpose language at our disposal. I'm really happy with all these changes as it helps me write better programs, but these enhancements are irrelevant when what you want to do is to mainly write templates.");
        $movie1->setImagePath('https://www.imdb.com/title/tt0111161/mediaviewer/rm1306652160');
        $movie1->addActor($this->getReference('actor1'));
        $movie1->addActor($this->getReference('actor2'));
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('Scam 1992');
        $movie2->setReleaseYear(1994);
        $movie2->setDescription("PHP has greatly evolved over the years as far as reusability is concerned. Since PHP5, the object implementation is much better, and when traits will be supported in the next version of the language, we will have a solid general purpose language at our disposal. I'm really happy with all these changes as it helps me write better programs, but these enhancements are irrelevant when what you want to do is to mainly write templates.");
        $movie2->setImagePath('https://www.imdb.com/title/tt0111161/mediaviewer/rm1306652160');
        $movie2->addActor($this->getReference('actor3'));
        
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setTitle('Shark Tank');
        $movie3->setReleaseYear(1994);
        $movie3->setDescription("PHP has greatly evolved over the years as far as reusability is concerned. Since PHP5, the object implementation is much better, and when traits will be supported in the next version of the language, we will have a solid general purpose language at our disposal. I'm really happy with all these changes as it helps me write better programs, but these enhancements are irrelevant when what you want to do is to mainly write templates.");
        $movie3->setImagePath('https://www.imdb.com/title/tt0111161/mediaviewer/rm1306652160');
        $manager->persist($movie3);


        
        $movie4 = new Movie();
        $movie4->setTitle('The Hoppy');
        $movie4->setReleaseYear(1994);
        $movie4->setDescription("PHP has greatly evolved over the years as far as reusability is concerned. Since PHP5, the object implementation is much better, and when traits will be supported in the next version of the language, we will have a solid general purpose language at our disposal. I'm really happy with all these changes as it helps me write better programs, but these enhancements are irrelevant when what you want to do is to mainly write templates.");
        $movie4->setImagePath('https://www.imdb.com/title/tt0111161/mediaviewer/rm1306652160');
        $manager->persist($movie4);



        $manager->flush();





    }
}
