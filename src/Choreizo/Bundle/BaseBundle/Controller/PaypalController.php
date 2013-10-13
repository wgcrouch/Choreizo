<?php

namespace Choreizo\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Choreizo\Bundle\BaseBundle\Entity\User;
class PaypalController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ChoreizoBaseBundle:Default:index.html.twig', array('name' => $name));
    }

    public function loginCallbackAction(Request $request)
    {
    	$code = $request->query->get("code");
    	$scope = $request->query->get("scope");

    	$paypal = $this->get('paypal');
    	$token = $paypal->get_access_token($code);

    	$userInfo = $paypal->get_profile($token->access_token);
    	
    	$product = $this->getDoctrine()
        	->getRepository('ChoreizoBaseBundle:User')
        	->findOneByEmail($userInfo->email);

	    if (!$user) {
	        $user = new User();
	    }

    	
    }
}
