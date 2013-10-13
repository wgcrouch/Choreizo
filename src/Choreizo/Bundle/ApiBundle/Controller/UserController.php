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

    public function getUserTotalDebtAction(User $user)
    {
        // Get all debt fines
        $fines = $user->getFines();
        $total = 0;
        foreach ($fines as $fine) {
            $total -= $fine->getAmount();
        }
        // add them to all the credits
        $credits = $user->getCredits();
        foreach ($credits as $credit) {
            $total += $credit->getAmount();
        }
        return array('total' => $total);
    }
}
