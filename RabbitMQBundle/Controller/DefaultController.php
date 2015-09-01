<?php

namespace Gemuni\RabbitMQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GemuniRabbitMQBundle:Default:index.html.twig', array('name' => $name));
    }
}
