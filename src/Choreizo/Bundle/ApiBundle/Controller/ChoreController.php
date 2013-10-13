<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Choreizo\Bundle\BaseBundle\Entity\Chore;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for the api
 */
class ChoreController extends FOSRestController
{

    public function getChoresAction(Habitat $habitat)
    {
        return $habitat->getChores();
    }

    public function getMyChoresAction(User $user)
    {
        return $user->getChores();
    }

    public function getChoreAction(Chore $chore)
    {
        return $chore;
    }

    public function getChoreVoteAction(Chore $chore) {
        return $chore->getLastVote();
    }
}
