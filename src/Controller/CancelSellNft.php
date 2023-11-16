<?php

namespace App\Controller;

use App\Entity\Nft;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\SerializerInterface;


#[AsController]
class CancelSellNft extends AbstractController
{
    public function __construct(private readonly SerializerInterface $serializer,private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route(
        path: 'api/nfts/{id}/cancel_order',
        name: 'app_nft_cancel_order',
        methods: ['GET']
    )]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function __invoke(Request $request,Nft $nft): JsonResponse
    {
        if($nft->getOwner() !== $this->getUser()){
            return new JsonResponse("You are not the owner of this nft");
        }
        if(!$nft->getCurrentOrder()){
            return new JsonResponse("This nft is not on sale");
        }


        $transaction = $nft->getCurrentOrder();
        $nft->setCurrentOrder(null);

        $this->entityManager->remove($transaction);
        $this->entityManager->persist($nft);
        $this->entityManager->flush();

        return new JsonResponse("Order cancel!",200);
    }
}
