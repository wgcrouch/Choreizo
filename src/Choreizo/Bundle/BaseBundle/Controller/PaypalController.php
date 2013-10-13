<?php

namespace Choreizo\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


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
    	
    	$user = $this->getDoctrine()
        	->getRepository('ChoreizoBaseBundle:User')
        	->findOneByEmail($userInfo->email);

        $location = 'http://choreizo.localhost/a/index.html#/people';

	    if (!$user) {
	        $user = $this->registerUser($userInfo, $token);
	    }

        if ($user->getInvite()) {
            $location = 'http://choreizo.localhost/a/index.html#/register';
            $user->setFirstName($userInfo->given_name);
            $user->setLastName($userInfo->family_name);
            $user->setInvite(false);
        }

        if (!$user->getHabitat()) {
            $location = 'http://choreizo.localhost/a/index.html#/register';
        }

        $em = $this->getDoctrine()->getManager();
        $user->setAccessToken($token->access_token);
        $user->setRefreshToken($token->refresh_token);
        $em->persist($user);
        $em->flush();
        $this->doLogin($user, $request);
        
        return $this->render('ChoreizoBaseBundle:Paypal:redirect.html.twig', array('location' => $location));   	
    }

    protected function registerUser($userInfo)
    {
        $em = $this->getDoctrine()->getManager();
       
        $user = new User();
        $user->setUsername($userInfo->email);
        $user->setEmail($userInfo->email);
        $user->setFirstName($userInfo->given_name);
        $user->setLastName($userInfo->family_name);
        $user->setGravatar(md5(strtolower(trim($userInfo->email))));
        $factory = $this->get('security.encoder_factory');

        $encoder = $factory->getEncoder($user);

        $password = $encoder->encodePassword(microtime(), $user->getSalt());

        $user->setPassword($password);

        $em->persist($user);
        $em->flush();
        return $user;
    }

    protected function doLogin($user, $request)
    {
        $session = $this->get('session');

        $firewall = 'main';
        $token = new UsernamePasswordToken($user->getUsername(), $user->getPassword(), $firewall, $user->getRoles());;
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $event = new InteractiveLoginEvent($request, $token);
        $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

    }
}
