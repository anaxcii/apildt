<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

;

class UserFixtures extends Fixture
{
    private $hasher;

    function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername("TattyJosy");
        $admin->setPassword($this->hasher->hashPassword($admin, "LaJosCasseLaBaraque"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setEmail("tatty@jossy.com");

        //Image
        $image = new Image();
        $image->filePath = "tatty.avif";
        $admin->setImage($image);
        $image->setOwner($admin);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "tattybanner.avif";
        $admin->setBannerImage($image);
        $image->setOwner($admin);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $manager->persist($admin);
        $manager->flush();
    }
}