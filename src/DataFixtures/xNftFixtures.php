<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use App\Entity\Image;
use App\Entity\Nft;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class xNftFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $dropdate = new DateTime();
        $bayc = $manager->getRepository(Gallery::class)->findOneBy(['name' => "Bored Ape Yatch Club"]);
        $user = $manager->getRepository(User::class)->findOneBy(['username' => "TattyJosy"]);
//
        $bayc1 = new Nft();
        $bayc1->setName("7560");
        $bayc1->setNftgallery($bayc);
        $bayc1->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc1.avif";
        $bayc1->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);
//
        $bayc2 = new Nft();
        $bayc2->setName("5521");
        $bayc2->setNftgallery($bayc);
        $bayc2->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc2.avif";
        $bayc2->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);
//
        $bayc3 = new Nft();
        $bayc3->setName("3360");
        $bayc3->setNftgallery($bayc);
        $bayc3->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc3.avif";
        $bayc3->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);
        //
        $bayc4 = new Nft();
        $bayc4->setName("4451");
        $bayc4->setNftgallery($bayc);
        $bayc4->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc4.avif";
        $bayc4->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);
//
        $bayc5 = new Nft();
        $bayc5->setName("6491");
        $bayc5->setNftgallery($bayc);
        $bayc5->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc5.avif";
        $bayc5->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);
//
        $bayc6 = new Nft();
        $bayc6->setName("2594");
        $bayc6->setNftgallery($bayc);
        $bayc6->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc6.avif";
        $bayc6->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);

        //
        $bayc7 = new Nft();
        $bayc7->setName("6203");
        $bayc7->setNftgallery($bayc);
        $bayc7->setMintdate($dropdate);

        $image = new Image();
        $image->filePath = "bayc7.avif";
        $bayc7->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());

        $manager->persist($image);


        $manager->persist($bayc7);
        $manager->persist($bayc6);
        $manager->persist($bayc5);
        $manager->persist($bayc4);
        $manager->persist($bayc3);
        $manager->persist($bayc2);
        $manager->persist($bayc1);
        $manager->flush();
    }
}
