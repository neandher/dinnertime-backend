<?php

namespace App\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EncodePasswordSubscriber implements EventSubscriber
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate'
        ];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $user = $eventArgs->getObject();

        if (!$user instanceof UserInterface) {
            return;
        }

        $this->encodePassword($user);
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $user = $eventArgs->getObject();

        if (!$user instanceof UserInterface) {
            return;
        }

        $this->encodePassword($user);
    }

    private function encodePassword(UserInterface $user)
    {
        $plainPassword = $user->getPassword();

        if (!is_null($plainPassword)) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $plainPassword));
        }
    }
}