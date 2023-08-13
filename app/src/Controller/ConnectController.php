<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/connect', name: 'connect')]
class ConnectController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/connect', name: 'connect')]
    public function runMe(): JsonResponse
    {
        new JsonResponse([
            'status' => 'ok',
            'message' => 'Hello World!',
        ]);
    }
}
