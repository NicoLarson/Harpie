<?php

namespace App\DataFixtures;

use App\Entity\CadreLegal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CadreLegalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $prefet = (new CadreLegal())->setLibelle('Préfet');
        $manager->persist($prefet);
        $president = (new CadreLegal())->setLibelle('Président');
        $manager->persist($president);

        $manager->flush();
    }
}
