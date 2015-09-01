<?php

namespace Gemuni\ElasticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GemuniElasticBundle:Default:index.html.twig', array('name' => $name));
    }
}
