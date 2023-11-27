<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


#[AsController]
class UserController extends AbstractController
{
    public function __construct(private readonly SerializerInterface $serializer)
    {
    }

    #[Route('/api/currentUser', name: 'app_current_user', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        $user = $this->serializer->serialize($this->getUser(),'json',['groups'=>'user:read']);
        return new JsonResponse(json_decode($user), $this->getUser() !== null ? 200 : 401);
    }
}
