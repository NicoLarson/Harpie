<?php

namespace App\DataFixtures;

use App\Entity\EffectifCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EffectifCategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $gendarmerie = (new EffectifCategorie())->setLibelle('Gendarmerie');
        $manager->persist($gendarmerie);
        $fag = (new EffectifCategorie())->setLibelle('FAG');
        $manager->persist($fag);

        $manager->flush();
    }
}
