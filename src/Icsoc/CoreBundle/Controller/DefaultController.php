<?php

namespace Icsoc\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IcsocCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
