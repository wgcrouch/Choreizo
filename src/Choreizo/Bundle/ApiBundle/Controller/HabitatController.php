<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for the api
 */
class HabitatController extends FOSRestController
{

    public function getHabitatsAction()
    {
        return array('success' => true);
    }

    public function getHabitatAction(Habitat $habitat)
    {
        return $habitat;
    }

    public function getHabitatUsersAction(Habitat $habitat) {
        return $habitat->getUsers();
    }
}
