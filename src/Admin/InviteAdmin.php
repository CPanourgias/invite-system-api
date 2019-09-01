<?php

namespace App\Admin;

use App\Entity\Invite;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class InviteAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', TextType::class)
            ->add('status', TextType::class)
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', TextType::class)
            ->add('status', TextType::class)
        ;
    }
}