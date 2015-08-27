<?php

namespace Gemuni\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GemuniUtilityBundle:Default:index.html.twig', array('name' => $name));
    }
}
