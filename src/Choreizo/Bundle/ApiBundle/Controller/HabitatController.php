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

/**
 * Test controller for the api
 */
class HabitatController extends FOSRestController
{

    public function getHabitatsAction(Habitat $habitat)
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
        foreach ($request->request->get('users') as $user) {
            $chore = new Chore();
            $form = $this->createForm(new ChoreForm(), $chore);
            $children = $form->all();
            $data = array_intersect_key($request->request->all(), $children);
            $form->bind($data);
            $chore->setTargetUser(new User($user));
            $chore->setCompleted(false);
            $currentUser = $this->get('security.context')->getToken()->getUser();
            if (!$currentUser instanceof User) {
                $currentUser = $this->getDoctrine()
                    ->getRepository('ChoreizoBaseBundle:User')
                    ->findOneByEmail($currentUser);
            }
            $chore->setUser($currentUser);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($chore);
                $em->flush();
                return $chore->getId();
            }
            return $form;
        }
    }
}
