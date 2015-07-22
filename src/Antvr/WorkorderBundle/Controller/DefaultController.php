<?php

namespace Antvr\WorkorderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AntvrWorkorderBundle:Default:index.html.twig', array('name' => $name));
    }
}
