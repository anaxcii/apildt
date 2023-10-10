<?php

namespace App\DataFixtures;

use App\Entity\Nft;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class xNftFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bayc1= new Nft();

        $manager->flush();
    }
}
