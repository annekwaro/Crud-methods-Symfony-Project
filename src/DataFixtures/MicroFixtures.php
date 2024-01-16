<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MicroFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $microPost1 = new MicroPost();
         $microPost1->setTitle('Hello World');
         $microPost1->setText('Hello World');
         $microPost1->setCreated(new \DateTime('now'));
         $manager->persist($microPost1);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('Welcome to France');
        $microPost2->setText('Welcome to France');
        $microPost2->setCreated(new \DateTime('now'));
        $manager->persist($microPost2);

        $microPost3 = new MicroPost();
        $microPost3->setTitle('Welcome to Sweden');
        $microPost3->setText('Welcome to Sweden');
        $microPost3->setCreated(new \DateTime('now'));
        $manager->persist($microPost3);

        $manager->flush();
    }
}