<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;


#[AsController]
class UserController extends AbstractController
{
    #[Route('/api/currentUser', name: 'app_current_user', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        return $this->json($this->getUser());
    }
}
