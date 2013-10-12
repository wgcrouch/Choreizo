<?php

namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

/**
 * Test controller for the api
 */
class TestController extends FOSRestController
{

    public function getTestAction()
    {
        return array('success' => true);
    }
}