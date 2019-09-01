<?php

namespace App\Repository;

use App\Entity\Invite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Invite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invite[]    findAll()
 * @method Invite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invite::class);
    }

    /**
     * @return Invite[] Returns an array of Invite objects
     */
    public function findBySenderId($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.sender = :val')
            ->setParameter('val', $value)
            ->innerJoin('i.reciever', 'u')
            ->addSelect('u')
            ->andWhere('i.reciever = u.id')
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getArrayResult()
        ;
    }

    /**
     * @return Invite[] Returns an array of Invite objects
     */
    public function findByRecieverId($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.reciever = :val')
            ->setParameter('val', $value)
            ->innerJoin('i.sender', 'u')
            ->addSelect('u')
            ->andWhere('i.sender = u.id')
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getArrayResult()
        ;
    }

    // Returns an User object
    public function returnInvite($value): ?Invite
    {
        return $this->createQueryBuilder('i')
            ->select()
            ->andWhere('i.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function getAll() {
        $qb = $this->createQueryBuilder('i');
        return $qb->getQuery()->getArrayResult();
    }
}