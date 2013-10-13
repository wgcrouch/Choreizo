<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Choreizo\Bundle\BaseBundle\Entity\Chore;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Choreizo\Bundle\BaseBundle\Form\ChoreForm;

use Symfony\Component\HttpFoundation\Session\Session;

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

    public function getHabitatUsersAction(Habitat $habitat)
    {
        return $habitat->getUsers();
    }

    public function getHabitatChoresAction(Habitat $habitat)
    {
        return $habitat->getChores();
    }

    public function postHabitatChoresAction(Habitat $habitat, Request $request)
    {
        $chore = new Chore();
        $form = $this->createForm(new ChoreForm(), $chore);
        $form->bind($request);
        $chore->setHabitat($habitat);
        $chore->setCompleted(false);
        $user= $this->get('security.context')->getToken()->getUser();
        $chore->setUser($user);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chore);
            $em->flush();
            return $chore->getId();
        }
        return $form;
    }
}
