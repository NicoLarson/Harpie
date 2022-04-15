<?php

namespace App\DataFixtures;

use App\Entity\Manoeuvre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ManoeuvreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jungle = (new Manoeuvre())->setLibelle('Jungle');
        $manager->persist($jungle);

        $savane = (new Manoeuvre())->setLibelle('Savane');
        $manager->persist($savane);

        $montagne = (new Manoeuvre())->setLibelle('Montagne');
        $manager->persist($montagne);

        $manager->flush();
    }
}
