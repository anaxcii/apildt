<?php
namespace App\Controller;
use App\Entity\Image;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

#[AsController]
final class CreateMediaObjectAction extends AbstractController
{
    public function __invoke(Request $request): Image
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $mediaObject = new Image();
        $mediaObject->setOwner($this->getUser());
        $mediaObject->setUpdatedAt(new DateTime());
        $mediaObject->file = $uploadedFile;
        return $mediaObject;
    }
}