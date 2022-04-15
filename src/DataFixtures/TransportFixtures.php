<?php

namespace App\DataFixtures;

use App\Entity\Transport;
use App\Entity\TransportSousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TransportFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $quatreQuatre = (new TransportSousCategorie())->setLibelle('4x4');
        $manager->persist($quatreQuatre);

        $fourgon = (new TransportSousCategorie())->setLibelle('Fourgon');
        $manager->persist($fourgon);


        $kikiwi = (new TransportSousCategorie())->setLibelle('Kikiwi');
        $manager->persist($kikiwi);

        $helicopterKikiwi = (new Transport())->setCategorie('Hélicopter')->setSousCategorie($kikiwi);
        $manager->persist($helicopterKikiwi);

        $voiture44 = (new Transport())->setCategorie('Voiture')->setSousCategorie($quatreQuatre);
        $manager->persist($voiture44);

        $voitureFourgon = (new Transport())->setCategorie('Voiture')->setSousCategorie($fourgon);
        $manager->persist($voitureFourgon);

        $manager->flush();
    }
}
