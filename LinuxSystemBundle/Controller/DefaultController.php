<?php

namespace Gemuni\LinuxSystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GemuniLinuxSystemBundle:Default:index.html.twig', array('name' => $name));
    }
}
