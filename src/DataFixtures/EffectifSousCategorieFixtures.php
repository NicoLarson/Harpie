<?php

namespace App\DataFixtures;

use App\Entity\EffectifSousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EffectifSousCategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $officier = (new EffectifSousCategorie())->setLibelle('Officier');
        $manager->persist($officier);
        $sousOfficier = (new EffectifSousCategorie())->setLibelle('Sous-officier');
        $manager->persist($sousOfficier);
        $hommeDuRang = (new EffectifSousCategorie())->setLibelle('Homme du rang');
        $manager->persist($hommeDuRang);

        $manager->flush();
    }
}
