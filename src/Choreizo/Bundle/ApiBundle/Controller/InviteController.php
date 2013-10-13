<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Choreizo\Bundle\BaseBundle\Form\InviteForm;

class InviteController extends FOSRestController
{
    //Refactor this out
    public function getCurrentUser()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        if (!$user instanceof User) {
            $user = $this->getDoctrine()
                ->getRepository('ChoreizoBaseBundle:User')
                ->findOneByEmail($user);
        }
        return $user;

    }

    public function postInviteAction(Request $request)
    {
    	$user = $this->getCurrentUser();
        $habitat = $user->getHabitat();

        $invite = new User();
        $form = $this->createForm(new InviteForm(True), $invite);
        $data = $request->request->all();
    	$children = $form->all();
    	$data = array_intersect_key($data, $children);
        $form->bind($data);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $invite->setHabitat($habitat);
            $invite->setUsername($invite->getEmail());
            $factory = $this->get('security.encoder_factory');

            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword(microtime(), $user->getSalt());
            $invite->setPassword($password);
            $invite->setInvite(True);

            $em->persist($invite);
            $em->flush();
            return $invite;
            //Ideally send an email at this point
        }
        return $form;
    }
}
