<?php

namespace App\DataFixtures;

use App\Entity\Communication;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CommunicationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $robert = (new Communication())->setNom('Robert')->setInfo('Tel: 0607080910');
        $manager->persist($robert);

        $roberta = (new Communication())->setNom('Roberta')->setInfo('Mail: roberta@protonmail.com');
        $manager->persist($roberta);

        $victoria = (new Communication())->setNom('Victoria')->setInfo('Tel: 0907080910');
        $manager->persist($victoria);

        $manager->flush();
    }
}
