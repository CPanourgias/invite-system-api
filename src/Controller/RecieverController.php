<?php

namespace App\Controller;

use App\Entity\Invite;
use App\Repository\InviteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
* @Route("reciever/{id}")
 */
class RecieverController extends AbstractController
{
    /**
     * @Route("/view", name="view_recieved_invites")
     */
    public function ViewRecieved($id, InviteRepository $inviteRepository, UserRepository $userRepository) {
        return new JsonResponse([
            'Reciever' => $userRepository->findById($id),
            'Invitations' => $inviteRepository->findByRecieverId($id)
        ]);
    }

    /**
     * @Route("/accept_{inv_id}", name="accept")
     */
    public function acceptInv($id, $inv_id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $invite = $entityManager->getRepository(Invite::class)->find($inv_id);

        if (!$invite) {
            throw $this->createNotFoundException(
                'No invite found for id '.$inv_id
            );
        }

        $invite->setStatus('accepted');
        $entityManager->flush();

        return $this->redirectToRoute('view_recieved_invites', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/decline_{inv_id}", name="decline")
     */
    public function declineInv($id, $inv_id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $invite = $entityManager->getRepository(Invite::class)->find($inv_id);

        if (!$invite) {
            throw $this->createNotFoundException(
                'No invite found for id '.$inv_id
            );
        }

        $invite->setStatus('declined');
        $entityManager->persist($invite);
        $entityManager->flush();

        return $this->redirectToRoute('view_recieved_invites', [
            'id' => $id
        ]);
    }
}
