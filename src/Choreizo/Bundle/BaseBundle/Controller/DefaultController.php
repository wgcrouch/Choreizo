<?php

namespace Choreizo\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ChoreizoBaseBundle:Default:index.html.twig', array('name' => $name));
    }
}
