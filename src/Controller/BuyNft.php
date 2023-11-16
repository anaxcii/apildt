<?php

namespace App\Controller;

use App\Entity\Nft;
use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[AsController]
class BuyNft extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route(
        path: 'api/nfts/{id}/buy',
        name: 'app_nft_buy',
        methods: ['GET']
    )]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function __invoke(Request $request,Nft $nft): JsonResponse
    {


        /** @var User $buyer */
        $buyer = $this->getUser();

        $transaction = $nft->getCurrentOrder();

        if(!$transaction){
            return new JsonResponse("This nft is not on sale");
        }

        $seller = $nft->getOwner();

        if($seller === $buyer){
            return new JsonResponse("You can't buy your own nft");
        }

        $price = $transaction->getPriceBuy();

        if($buyer->getMoney() < $price){
            return new JsonResponse("Not enough funds");
        }

        $buyer->setMoney($buyer->getMoney() - $price);

        $seller->setMoney($seller->getMoney() + $price);


        $nft->setOwner($buyer);

        $nft->setCurrentOrder(null);

        $transaction->setStatus(Transaction::Sold);
        $transaction->setUserBuyerId($buyer);
        $transaction->setEndDate(new \DateTime());


        $this->entityManager->persist($transaction);
        $this->entityManager->persist($nft);
        $this->entityManager->flush();

        return new JsonResponse("Nft buy successfully");

    }
}
