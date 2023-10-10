<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use DateTime;
use App\Entity\Nft;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class xNftFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $dropdate = new DateTime();
        $bayc = $manager->getRepository(Gallery::class)->findOneBy(['name' => "Bored Ape Yatch Club"]);


        $bayc1 = new Nft();
        $bayc1->setName("7560");
        $bayc1->setImage("assets/img/nft/bayc1.avif");
        $bayc1->setPrice(5);
        $bayc1->setNftgallery($bayc);
        $bayc1->setOnSale(true);
        $bayc1->setMintdate($dropdate);

        $bayc2 = new Nft();
        $bayc2->setName("5521");
        $bayc2->setImage("assets/img/nft/bayc2.avif");
        $bayc2->setPrice(3);
        $bayc2->setNftgallery($bayc);
        $bayc2->setOnSale(true);
        $bayc2->setMintdate($dropdate);

        $bayc3 = new Nft();
        $bayc3->setName("3360");
        $bayc3->setImage("assets/img/nft/bayc3.avif");
        $bayc3->setPrice(6);
        $bayc3->setNftgallery($bayc);
        $bayc3->setOnSale(true);
        $bayc3->setMintdate($dropdate);

        $bayc4 = new Nft();
        $bayc4->setName("4451");
        $bayc4->setImage("assets/img/nft/bayc4.avif");
        $bayc4->setPrice(1);
        $bayc4->setNftgallery($bayc);
        $bayc4->setOnSale(true);
        $bayc4->setMintdate($dropdate);

        $bayc5 = new Nft();
        $bayc5->setName("6491");
        $bayc5->setImage("assets/img/nft/bayc5.avif");
        $bayc5->setPrice(2);
        $bayc5->setNftgallery($bayc);
        $bayc5->setOnSale(true);
        $bayc5->setMintdate($dropdate);

        $bayc6 = new Nft();
        $bayc6->setName("2594");
        $bayc6->setImage("assets/img/nft/bayc6.avif");
        $bayc6->setPrice(9);
        $bayc6->setNftgallery($bayc);
        $bayc6->setOnSale(false);
        $bayc6->setMintdate($dropdate);

        $bayc7 = new Nft();
        $bayc7->setName("6203");
        $bayc7->setImage("assets/img/nft/bayc7.avif");
        $bayc7->setPrice(5);
        $bayc7->setNftgallery($bayc);
        $bayc7->setOnSale(false);
        $bayc7->setMintdate($dropdate);


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
