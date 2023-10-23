<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use App\Entity\Image;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class xGalleryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = $manager->getRepository(User::class)->findOneBy(['username' => "TattyJosy"]);
        $dropdate = new DateTime();

        $gridhaus= new Gallery();
        $gridhaus->setName("Grid Haus");

        $gridhaus->setCategory("Art");
        $gridhaus->setCreator($user);
        $gridhaus->setDescription("Grid Haus is an animated generative art project that turns your entire wallet address into an art piece.");
        $gridhaus->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $gridhaus->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $gridhaus->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $whoopsies= new Gallery();
        $whoopsies->setName("Whoopsies");

        $whoopsies->setCategory("PFPs");
        $whoopsies->setCreator($user);
        $whoopsies->setDescription("Whoopsies represents a set of family-friendly NFTs that drive forward Web3 innovation by leveraging intellectual property and fostering community empowerment");
        $whoopsies->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $whoopsies->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $whoopsies->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);


        $bayc= new Gallery();
        $bayc->setName("Bored Ape Yatch Club");

        $bayc->setCategory("PFPs");
        $bayc->setCreator($user);
        $bayc->setDescription("The Bored Ape Yacht Club is a collection of unique digital collectibles living on the Ethereum blockchain.");
        $bayc->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $bayc->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $bayc->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);


        $mayc= new Gallery();
        $mayc->setName("Mutant Ape Yatch Club");

        $mayc->setCategory("PFPs");
        $mayc->setCreator($user);
        $mayc->setDescription("The MUTANT APE YACHT CLUB is a collection of Mutant Apes that can only be created by exposing an existing Bored Ape to a vial of MUTANT SERUM");
        $mayc->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $mayc->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $mayc->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $cryptopunk= new Gallery();
        $cryptopunk->setName("CryptoPunks");

        $cryptopunk->setCategory("PFPs");
        $cryptopunk->setCreator($user);
        $cryptopunk->setDescription("CryptoPunks launched in mid-2017 and became one of the inspirations for the ERC-721 standard.");
        $cryptopunk->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $cryptopunk->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $cryptopunk->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $bakc= new Gallery();
        $bakc->setName("Bored Ape Kennel Club");

        $bakc->setCategory("PFPs");
        $bakc->setCreator($user);
        $bakc->setDescription("It gets lonely in the swamp sometimes. That's why every ape should have a four-legged companion.");
        $bakc->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $bakc->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $bakc->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        
        $deadmigos= new Gallery();
        $deadmigos->setName("Deadmigos");

        $deadmigos->setCategory("PFPs");
        $deadmigos->setCreator($user);
        $deadmigos->setDescription("Dreamed of moonshots but awoke to a capitulation.");
        $deadmigos->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $deadmigos->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $deadmigos->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $azuki= new Gallery();
        $azuki->setName("Azuki");

        $azuki->setCategory("PFPs");
        $azuki->setCreator($user);
        $azuki->setDescription("Take the red bean to join the garden.");
        $azuki->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $azuki->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $azuki->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $meebits= new Gallery();
        $meebits->setName("Meebits");

        $meebits->setCategory("PFPs");
        $meebits->setCreator($user);
        $meebits->setDescription("The Meebits are unique 3D voxel characters, created by a custom generative algorithm.");
        $meebits->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $meebits->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $meebits->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $pudgypenguins= new Gallery();
        $pudgypenguins->setName("Pudgy Penguins");

        $pudgypenguins->setCategory("PFPs");
        $pudgypenguins->setCreator($user);
        $pudgypenguins->setDescription("Embodying love, empathy, & compassion, the Pudgy Penguins are a beacon of good vibes & positivity for everyone.");
        $pudgypenguins->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $pudgypenguins->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $pudgypenguins->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $lilpudgys= new Gallery();
        $lilpudgys->setName("Lil Pudgys");

        $lilpudgys->setCategory("PFPs");
        $lilpudgys->setCreator($user);
        $lilpudgys->setDescription(" Don’t let their small stature fool you, Lil Pudgys are an integral piece of the Pudgy Penguins history.");
        $lilpudgys->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $lilpudgys->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $lilpudgys->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $gutterjuice= new Gallery();
        $gutterjuice->setName("Gutter Juice");

        $gutterjuice->setCategory("Art");
        $gutterjuice->setCreator($user);
        $gutterjuice->setDescription("In order to continue GCG’s path to dominance in the autonomous zone and metaverse.");
        $gutterjuice->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $gutterjuice->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $gutterjuice->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $moncler= new Gallery();
        $moncler->setName("Moncler x adidas");

        $moncler->setCategory("Art");
        $moncler->setCreator($user);
        $moncler->setDescription("Here's to the explorers.");
        $moncler->setDropdate($dropdate);

        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $moncler->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $moncler->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $winds= new Gallery();
        $winds->setName("Winds of Yawanawa");

        $winds->setCategory("Art");
        $winds->setCreator($user);
        $winds->setDescription("A first-of-its-kind space of co-creation between the Brazilian Indigenous Yawanawa community and media artist Refik Anadol.");
        $winds->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $winds->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $winds->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $koripo= new Gallery();
        $koripo->setName("Koripo");

        $koripo->setCategory("Art");
        $koripo->setCreator($user);
        $koripo->setDescription("gm.");
        $koripo->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $koripo->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $koripo->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $beacon= new Gallery();
        $beacon->setName("The Beacon");

        $beacon->setCategory("Gaming");
        $beacon->setCreator($user);
        $beacon->setDescription("The Beacon NFTs.");
        $beacon->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $beacon->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $beacon->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $parallel= new Gallery();
        $parallel->setName("Parallel Alpha");

        $parallel->setCategory("Gaming");
        $parallel->setCreator($user);
        $parallel->setDescription("Sci-fi collectable carde game with NFTs.");
        $parallel->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $parallel->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $parallel->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $otherside= new Gallery();
        $otherside->setName("Otherside Koda");

        $otherside->setCategory("Gaming");
        $otherside->setCreator($user);
        $otherside->setDescription("Kodas are celestial beings that reside in Otherside.");
        $otherside->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $otherside->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $otherside->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $otherdeed= new Gallery();
        $otherdeed->setName("Otherdeed Expanded");

        $otherdeed->setCategory("Gaming");
        $otherdeed->setCreator($user);
        $otherdeed->setDescription("New world");
        $otherdeed->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $otherdeed->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $otherdeed->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);

        $ztx= new Gallery();
        $ztx->setName("ZTX Homes");
        $ztx->setCategory("Gaming");
        $ztx->setCreator($user);
        $ztx->setDescription("ZTX is a web3 virtual world empowering creators and communities.");
        $ztx->setDropdate($dropdate);
        //Image
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $ztx->setImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);
        //Banner
        $image = new Image();
        $image->filePath = "65368c6664a50_coding.png";
        $ztx->setBannerImage($image);
        $image->setOwner($user);
        $image->setUpdatedAt(new DateTime());
        $manager->persist($image);


        $manager->persist($ztx);
        $manager->persist($otherdeed);
        $manager->persist($otherside);
        $manager->persist($parallel);
        $manager->persist($beacon);
        $manager->persist($koripo);
        $manager->persist($winds);
        $manager->persist($moncler);
        $manager->persist($gutterjuice);
        $manager->persist($lilpudgys);
        $manager->persist($pudgypenguins);
        $manager->persist($meebits);
        $manager->persist($azuki);
        $manager->persist($deadmigos);
        $manager->persist($bakc);
        $manager->persist($cryptopunk);
        $manager->persist($mayc);
        $manager->persist($bayc);
        $manager->persist($gridhaus);
        $manager->persist($whoopsies);
        $manager->flush();
    }
}
