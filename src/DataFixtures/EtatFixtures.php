<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $annule = (new Etat())->setLibelle('Annulé');
        $manager->persist($annule);

        $valide = (new Etat())->setLibelle('Validé');
        $manager->persist($valide);

        $refuse = (new Etat())->setLibelle('Refusé');
        $manager->persist($refuse);

        $soumis = (new Etat())->setLibelle('Soumis');
        $manager->persist($soumis);

        $manager->flush();
    }
}
