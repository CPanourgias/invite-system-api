<?php

namespace App\Controller;

use App\Repository\InviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/invite", name="invite")
     */
    public function invite(InviteRepository $inviteRepository)
    {
        return new JsonResponse($inviteRepository->getAll());
    }
}
