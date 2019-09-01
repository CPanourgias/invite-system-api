<?php

namespace App\Controller;

use App\Entity\Invite;
use App\Entity\User;
use App\Repository\InviteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
* @Route("sender/{id}")
 */
class SenderController extends AbstractController
{
    /**
     * @Route("/view", name="view_sent_invites")
     */
    public function view_sent($id, InviteRepository $inviteRepository, UserRepository $userRepository) {
        return new JsonResponse([
            'Sender' => $userRepository->findById($id),
            'Invitations' => $inviteRepository->findBySenderId($id)
        ]);
    }

    /**
     * @Route("/send_{inv_id}", name="send_an_invite")
     */
    public function send($id, $inv_id, UserRepository $userRepository) 
    {
        $sender = $userRepository->returnUser($id);
        $reciever = $userRepository->returnUser($inv_id);
        $em = $this->getDoctrine()->getManager();
        $invite = new Invite;
        $invite
            ->setStatus('pending')
            ->setSender($sender)
            ->setReciever($reciever)
        ;
        $em->persist($invite);
        $em->flush();

        return $this->redirectToRoute('view_sent_invites', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/cancel_{inv_id}", name="cancel_an_invite")
     */
    public function cancel($id, $inv_id, InviteRepository $inviteRepository) 
    {
        $em = $this->getDoctrine()->getManager();
        
        $invite = $inviteRepository->returnInvite($inv_id);
        $em->remove($invite);
        $em->flush();

        return $this->redirectToRoute('view_sent_invites', [
            'id' => $id
        ]);
    }
    
}
