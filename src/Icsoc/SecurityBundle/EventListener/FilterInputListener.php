<?php
/**
 * This file is part of ccod3.0, created by PhpStorm.
 * Author: LouXin
 * Date: 2015/6/18 9:39
 * File: FilterListener.php
 */

namespace Icsoc\SecurityBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * 过滤用户的输入
 * Class FilterInputListener
 * @package Icsoc\SecurityBundle\EventListener
 */
class FilterInputListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        ini_set('default_charset', 'utf-8');
        $request = $event->getRequest();
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $postArray = is_array($_POST) ? $_POST : array();
        $request->request->add($postArray);
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $getArray = is_array($_GET) ? $_GET : array();
        $request->query->add($getArray);
        $_COOKIE = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cookieArray = is_array($_COOKIE) ? $_COOKIE : array();
        $request->cookies->add($cookieArray);
    }
}
