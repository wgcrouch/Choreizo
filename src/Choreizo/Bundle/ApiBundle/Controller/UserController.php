<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{
    public function getUserAction(User $user) {
        return $user;
    }

    public function getUserChoresAction(User $user) {
        return $user->getChores();
    }
}
