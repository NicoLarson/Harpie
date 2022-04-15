<?php

namespace App\DataFixtures;

use App\Entity\Force;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ForceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $gendarme = (new Force())->setLibelle('Gendarme');
        $manager->persist($gendarme);

        $paf = (new Force())->setLibelle('PAF');
        $manager->persist($paf);

        $manager->flush();
    }
}
