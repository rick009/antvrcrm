<?php

namespace Icsoc\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IcsocUIBundle:Default:index.html.twig', array(
            'menus' => $this->container->getParameter('menus')
        ));
    }

    public function dashboardAction()
    {
        return $this->render("IcsocUIBundle:Default:dashboard.html.twig");
    }

    public function messageAction(Request $request)
    {
        $data = $request->get('data');

        if (!isset($data['link']) || count($data['link'])==0) {
            $data['link'] = array(
                array('text'=>'返回', 'href'=>'javascript:history.go(-1)')
            );
        }
        if (!isset($data['type'])) {
            $data['type'] = 'info';
        }
        $data['default_url'] = $data['link'][0]['href'];
        $data['link_type'] = isset($data['link'][0]['type']) ? 1 : '';
        $data['auto_redirect'] = isset($data['auto_redirect']) ? $data['auto_redirect'] : true;

        return $this->render(
            'IcsocUIBundle:Default:message.html.twig',
            array(
                'datavalue'=>$data
            )
        );
    }
}
