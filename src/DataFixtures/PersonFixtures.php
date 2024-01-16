<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Entity\MicroPost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $person1 = new Person();
         $person1->setName('<NAME>');
         $person1->setAddress('Paris');
         $person1->setDateOfBirth(new \DateTime('now'));
         $person1->setAge(25);
         $person1->setEmploymentStatus('Employed');
         $manager->persist($person1);

         $person2 = new Person();
         $person2->setName('<NAME>');
         $person2->setAddress('Paris');
         $person2->setDateOfBirth(new \DateTime('now'));
         $person2->setAge(25);
         $person2->setEmploymentStatus('Employed');
         $manager->persist($person2);

         $person3 = new Person();
         $person3->setName('<NAME>');
         $person3->setAddress('Paris');
         $person3->setDateOfBirth(new \DateTime('now'));
         $person3->setAge(25);
         $person3->setEmploymentStatus('Employed');
         $manager->persist($person3);

         $person4 = new Person();
         $person4->setName('<NAME>');
         $person4->setAddress('Paris');
         $person4->setDateOfBirth(new \DateTime('now'));
         $person4->setAge(35);
         $person4->setEmploymentStatus('Employed');
         $manager->persist($person4);

         $person5 = new Person();
         $person5->setName('<NAME>');
         $person5->setAddress('Paris');
         $person5->setDateOfBirth(new \DateTime('now'));
         $person5->setAge(15);
         $person5->setEmploymentStatus('Employed');
         $manager->persist($person5);

         $person6 = new Person();
         $person6->setName('<NAME>');
         $person6->setAddress('Paris');
         $person6->setDateOfBirth(new \DateTime('now'));
         $person6->setAge(30);
         $person6->setEmploymentStatus('Employed');
         $manager->persist($person6);



        $manager->flush();
    }
}