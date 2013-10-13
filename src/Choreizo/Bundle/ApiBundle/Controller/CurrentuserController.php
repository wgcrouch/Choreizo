<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Choreizo\Bundle\BaseBundle\Form\UserForm;

class CurrentuserController extends FOSRestController
{

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
    public function getCurrentuserAction() 
    {
        return $this->getCurrentUser();
    }

    public function putCurrentuserAction(Request $request)
    {
    	$user = $this->getCurrentUser();
        $form = $this->createForm(new UserForm(True), $user);
        $data = $request->request->all();
    	$children = $form->all();
    	$data = array_intersect_key($data, $children);
        $form->bind($data);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $user;
        }
        return $form;
    }

    public function postCurrentuserHabitatAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$habitat = new Habitat();
    	$habitat->setName($request->request->get('name'));
    	$em->persist($habitat);
    	$user = $this->getCurrentUser();
    	$user->setHabitat($habitat);
    	$em->persist($user);
        $em->flush();
    	return $habitat;
    }

}
