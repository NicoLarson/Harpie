<?php

namespace App\DataFixtures;

use App\Entity\Demandeur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DemandeurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jeanMichel = (new Demandeur())
            ->setNumeroIdentifiantGendarme('123456789')
            ->setRole('Gendarme');

        $manager->persist($jeanMichel);

        $manager->flush();
    }
}
