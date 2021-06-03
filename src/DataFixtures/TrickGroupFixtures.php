<?php

namespace App\DataFixtures;

use App\Entity\TrickGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $trickGroups = ['Grabs', 'Rotations', 'Flips', 'Rotations désaxées', 'Slides', 'Old school'];

        foreach ($trickGroups as $name)
        {
            $trickGroup = new TrickGroup();
            $trickGroup->setGroupName($name);
            $manager->persist($trickGroup);
        }

        $manager->flush();
    }
}
