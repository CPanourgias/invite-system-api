<?php

namespace App\Controller;

use App\Repository\InviteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/users", name="user")
     */
    public function users(UserRepository $userRepository)
    {
        return new JsonResponse($userRepository->getAll());
    }

    /**
     * @Route("/invites", name="invite")
     */
    public function invites(InviteRepository $inviteRepository)
    {
        return new JsonResponse($inviteRepository->getAll());
    }
}
