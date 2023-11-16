<?php

namespace App\Controller;

use App\Entity\Nft;
use App\Entity\Transaction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\SerializerInterface;


#[AsController]
class SellNft extends AbstractController
{
    public function __construct(private readonly SerializerInterface $serializer,private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route(
        path: 'api/nfts/{id}/sell',
        name: 'app_nft_sell',
        methods: ['POST']
    )]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function __invoke(Request $request,Nft $nft): JsonResponse
    {
        if($nft->getOwner() !== $this->getUser()){
            return new JsonResponse("You are not the owner of this nft");
        }
        if($nft->getCurrentOrder()){
            return new JsonResponse("This nft is already on sale");
        }

        $data = json_decode($request->getContent());

        if(!isset($data->price)){
            return new JsonResponse("Price missing");
        }

        $transaction = new Transaction();
        $transaction->setCreationDate(new \DateTime());
        $transaction->setNftId($nft);
        $transaction->setUserSellerId($nft->getOwner());

        $transaction->setPriceBuy($data->price);
        $transaction->setStatus(Transaction::OnSale);

        $nft->setCurrentOrder($transaction);

        $this->entityManager->persist($transaction);
        $this->entityManager->persist($nft);
        $this->entityManager->flush();

        $response = $this->serializer->serialize($transaction,'json',['groups'=>'$transaction:read']);

        return new JsonResponse("Nft on sale!",200);
    }
}
