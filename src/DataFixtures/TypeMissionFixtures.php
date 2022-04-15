<?php

namespace App\DataFixtures;

use App\Entity\TypeMission;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeMissionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pla = (new TypeMission())->setLibelle('PLA');
        $manager->persist($pla);

        $anaconda = (new TypeMission())->setLibelle('ANACONDA');
        $manager->persist($anaconda);

        $plc = (new TypeMission())->setLibelle('PLC');
        $manager->persist($plc);

        $manager->flush();
    }
}
