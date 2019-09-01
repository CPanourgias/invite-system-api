/**
     * @Route("/send", methods={"POST"})
     */
    public function send() {
        return new Response(true);
    }
    /**
     * Accept an invite
     * @Route("/accept/{id}", methods={"PUT"})
     */
    public function accept($id, InviteRepository $inviteRepository) {
        return new JsonResponse($inviteRepository->acceptInviteWithId($id));
    }

    /**
     * Decline an invite
     * @Route("/decline/{id}", methods={"PUT"})
     */
    public function decline() {
        return 1;
    }

    /**
     * Cancel an invite
     * @Route("/cancel/{invitation_id}", methods={"DELETE"})
     */
    public function cancel($invitation_id, InviteRepository $inviteRepository) {
        return new JsonResponse($inviteRepository->delete($invitation_id));
    }


    <?php



    /**
     * @Route("/accept/{invitation_id}", name="accept_an_invite")
     */
    public function accept($invitation_id, InviteRepository $inviteRepository) 
    {
        return new JsonResponse([
            'Invite' => $inviteRepository->accept($invitation_id)
        ]);
    }

public function accept($value)
{
    $em = $this->getEntityManager();
    $query = $em->createQuery(
        `UPDATE invite SET status = 'accepted' WHERE id = :val`
    )->setParameter('val', $value);

    return $query->execute();
}
namespace App\Controller;



/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * View the invites the user has recieved
     * @Route("/recieved/{id}", methods={"GET"})
     */
    public function recieved($id, InviteRepository $inviteRepository) {
        return new JsonResponse($inviteRepository->findByRecieverId($id));
    }

    /**
     * View the invites the user has sent
     * @Route("/sent/{id}", methods={"GET"})
     */
    public function sent($id, InviteRepository $inviteRepository, UserRepository $userRepository) {
        return new JsonResponse([
            'By' => $userRepository->findOneBySomeField($id),
            'Invitations' => $inviteRepository->findBySenderId($id)
        ]);
    }

    /**
     * @Route("/accept/{id}", methods={"PUT"})
     */
    public function send($id, InviteRepository $inviteRepository) {
        return new JsonResponse($inviteRepository->acceptInviteById($id));
    }
}


/**
     * @Route("/cancel/{invite_id}", name="cancel_an_invite")
     */
    public function cancel($id, $invite_id, InviteRepository $inviteRepository, UserRepository $userRepository) {
        return new JsonResponse();
    }