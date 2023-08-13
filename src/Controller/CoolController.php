<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class CoolController extends AbstractController
{
    #[Route('/cool', name: 'cool')]
    public function index(): JsonResponse
    {
        return new JsonResponse(['status' => 'cool']);
    }
}
