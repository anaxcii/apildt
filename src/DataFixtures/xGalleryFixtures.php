<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
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
        $gridhaus->setImage("assets/img/gridhaus.avif");
        $gridhaus->setBannerImage("assets/img/gridhausbanner.avif");
        $gridhaus->setCategory("Art");
        $gridhaus->setCreator($user);
        $gridhaus->setDescription("Grid Haus is an animated generative art project that turns your entire wallet address into an art piece.");
        $gridhaus->setDropdate($dropdate);

        $whoopsies= new Gallery();
        $whoopsies->setName("Whoopsies");
        $whoopsies->setImage("assets/img/whoopsies.avif");
        $whoopsies->setBannerImage("assets/img/whoopsiesbanner.avif");
        $whoopsies->setCategory("PFPs");
        $whoopsies->setCreator($user);
        $whoopsies->setDescription("Whoopsies represents a set of family-friendly NFTs that drive forward Web3 innovation by leveraging intellectual property and fostering community empowerment");
        $whoopsies->setDropdate($dropdate);

        $bayc= new Gallery();
        $bayc->setName("Bored Ape Yatch Club");
        $bayc->setImage("assets/img/bayc.avif");
        $bayc->setBannerImage("assets/img/baycbanner.avif");
        $bayc->setCategory("PFPs");
        $bayc->setCreator($user);
        $bayc->setDescription("The Bored Ape Yacht Club is a collection of unique digital collectibles living on the Ethereum blockchain.");
        $bayc->setDropdate($dropdate);

        $mayc= new Gallery();
        $mayc->setName("Mutant Ape Yatch Club");
        $mayc->setImage("assets/img/mayc.avif");
        $mayc->setBannerImage("assets/img/maycbanner.avif");
        $mayc->setCategory("PFPs");
        $mayc->setCreator($user);
        $mayc->setDescription("The MUTANT APE YACHT CLUB is a collection of Mutant Apes that can only be created by exposing an existing Bored Ape to a vial of MUTANT SERUM");
        $mayc->setDropdate($dropdate);

        $cryptopunk= new Gallery();
        $cryptopunk->setName("Crypto Punk");
        $cryptopunk->setImage("assets/img/cryptopunk.avif");
        $cryptopunk->setBannerImage("assets/img/cryptopunkbanner.avif");
        $cryptopunk->setCategory("PFPs");
        $cryptopunk->setCreator($user);
        $cryptopunk->setDescription("CryptoPunks launched in mid-2017 and became one of the inspirations for the ERC-721 standard.");
        $cryptopunk->setDropdate($dropdate);

        $bakc= new Gallery();
        $bakc->setName("Bored Ape Kennel Club");
        $bakc->setImage("assets/img/bakc.avif");
        $bakc->setBannerImage("assets/img/bakcbanner.avif");
        $bakc->setCategory("PFPs");
        $bakc->setCreator($user);
        $bakc->setDescription("It gets lonely in the swamp sometimes. That's why every ape should have a four-legged companion.");
        $bakc->setDropdate($dropdate);

        
        $deadmigos= new Gallery();
        $deadmigos->setName("Deadmigos");
        $deadmigos->setImage("assets/img/deadmigos.avif");
        $deadmigos->setBannerImage("assets/img/deadmigosbanner.avif");
        $deadmigos->setCategory("PFPs");
        $deadmigos->setCreator($user);
        $deadmigos->setDescription("Dreamed of moonshots but awoke to a capitulation.");
        $deadmigos->setDropdate($dropdate);

        $azuki= new Gallery();
        $azuki->setName("Azuki");
        $azuki->setImage("assets/img/azuki.avif");
        $azuki->setBannerImage("assets/img/azukibanner.avif");
        $azuki->setCategory("PFPs");
        $azuki->setCreator($user);
        $azuki->setDescription("Take the red bean to join the garden.");
        $azuki->setDropdate($dropdate);

        $meebits= new Gallery();
        $meebits->setName("Meebits");
        $meebits->setImage("assets/img/meebits.avif");
        $meebits->setBannerImage("assets/img/meebitsbanner.avif");
        $meebits->setCategory("PFPs");
        $meebits->setCreator($user);
        $meebits->setDescription("The Meebits are unique 3D voxel characters, created by a custom generative algorithm.");
        $meebits->setDropdate($dropdate);

        $pudgypenguins= new Gallery();
        $pudgypenguins->setName("Pudgy Penguins");
        $pudgypenguins->setImage("assets/img/pudgypenguins.avif");
        $pudgypenguins->setBannerImage("assets/img/pudgypenguinsbanner.avif");
        $pudgypenguins->setCategory("PFPs");
        $pudgypenguins->setCreator($user);
        $pudgypenguins->setDescription("Embodying love, empathy, & compassion, the Pudgy Penguins are a beacon of good vibes & positivity for everyone.");
        $pudgypenguins->setDropdate($dropdate);

        $lilpudgys= new Gallery();
        $lilpudgys->setName("Lil Pudgys");
        $lilpudgys->setImage("assets/img/lilpudgys.avif");
        $lilpudgys->setBannerImage("assets/img/lilpudgysbanner.avif");
        $lilpudgys->setCategory("PFPs");
        $lilpudgys->setCreator($user);
        $lilpudgys->setDescription(" Don’t let their small stature fool you, Lil Pudgys are an integral piece of the Pudgy Penguins history.");
        $lilpudgys->setDropdate($dropdate);

        $gutterjuice= new Gallery();
        $gutterjuice->setName("Gutter Juice");
        $gutterjuice->setImage("assets/img/gutterjuice.avif");
        $gutterjuice->setBannerImage("assets/img/gutterjuicebanner.avif");
        $gutterjuice->setCategory("Art");
        $gutterjuice->setCreator($user);
        $gutterjuice->setDescription("In order to continue GCG’s path to dominance in the autonomous zone and metaverse.");
        $gutterjuice->setDropdate($dropdate);

        $moncler= new Gallery();
        $moncler->setName("Moncler x adidas");
        $moncler->setImage("assets/img/moncler.avif");
        $moncler->setBannerImage("assets/img/monclerbanner.avif");
        $moncler->setCategory("Art");
        $moncler->setCreator($user);
        $moncler->setDescription("Here's to the explorers.");
        $moncler->setDropdate($dropdate);

        $winds= new Gallery();
        $winds->setName("Winds of Yawanawa");
        $winds->setImage("assets/img/winds.avif");
        $winds->setBannerImage("assets/img/windsbanner.avif");
        $winds->setCategory("Art");
        $winds->setCreator($user);
        $winds->setDescription("A first-of-its-kind space of co-creation between the Brazilian Indigenous Yawanawa community and media artist Refik Anadol.");
        $winds->setDropdate($dropdate);

        $koripo= new Gallery();
        $koripo->setName("Koripo");
        $koripo->setImage("assets/img/koripo.avif");
        $koripo->setBannerImage("assets/img/koripobanner.avif");
        $koripo->setCategory("Art");
        $koripo->setCreator($user);
        $koripo->setDescription("gm.");
        $koripo->setDropdate($dropdate);

        $beacon= new Gallery();
        $beacon->setName("The Beacon");
        $beacon->setImage("assets/img/beacon.avif");
        $beacon->setBannerImage("assets/img/beaconbanner.avif");
        $beacon->setCategory("Gaming");
        $beacon->setCreator($user);
        $beacon->setDescription("The Beacon NFTs.");
        $beacon->setDropdate($dropdate);

        $parallel= new Gallery();
        $parallel->setName("Parallel Alpha");
        $parallel->setImage("assets/img/parallel.avif");
        $parallel->setBannerImage("assets/img/parallelbanner.avif");
        $parallel->setCategory("Gaming");
        $parallel->setCreator($user);
        $parallel->setDescription("Sci-fi collectable carde game with NFTs.");
        $parallel->setDropdate($dropdate);

        $otherside= new Gallery();
        $otherside->setName("Otherside Koda");
        $otherside->setImage("assets/img/otherside.avif");
        $otherside->setBannerImage("assets/img/othersidebanner.avif");
        $otherside->setCategory("Gaming");
        $otherside->setCreator($user);
        $otherside->setDescription("Kodas are celestial beings that reside in Otherside.");
        $otherside->setDropdate($dropdate);

        $otherdeed= new Gallery();
        $otherdeed->setName("Otherdeed Expanded");
        $otherdeed->setImage("assets/img/otherdeed.avif");
        $otherdeed->setBannerImage("assets/img/otherdeedbanner.avif");
        $otherdeed->setCategory("Gaming");
        $otherdeed->setCreator($user);
        $otherdeed->setDescription("New world");
        $otherdeed->setDropdate($dropdate);

        $ztx= new Gallery();
        $ztx->setName("ZTX Homes");
        $ztx->setImage("assets/img/ztx.avif");
        $ztx->setBannerImage("assets/img/ztxbanner.avif");
        $ztx->setCategory("Gaming");
        $ztx->setCreator($user);
        $ztx->setDescription("ZTX is a web3 virtual world empowering creators and communities.");
        $ztx->setDropdate($dropdate);


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
