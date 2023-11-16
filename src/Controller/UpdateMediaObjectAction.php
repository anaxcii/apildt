<?php

namespace App\Controller;

use App\Entity\Image;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class UpdateMediaObjectAction extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route(
        path: 'api/image/{id}/update',
        name: 'update_image',
        methods: ['POST']
    )]
    public function __invoke(Request $request,Image $image): Response
    {
        $uploadedFile = $request->files->get('file');

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $image->file = $uploadedFile;
        $image->setUpdatedAt(new DateTime());
        $this->entityManager->persist($image);
        $this->entityManager->flush();
        return new Response("api/images/".$image->getId());
    }
}