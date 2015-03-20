<?php

/**
 * Services are globally registered in this file
 */

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Annotations;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically registers the right services to provide a full stack framework
 */
$di = new FactoryDefault();

/**
 * Registering a router
 */
$di['router'] = function () use (&$di) {
    $di['logger']->log('Init global router service ');
    $router = new Annotations(false);

    $router->setDefaultModule('admin');

    // TODO Add specific route setting here

    // ARCH DO NOT REMOVE THIS LINE
    $router->addModuleResource('web', 'Wechat2\Web\Controllers\Question', '/web/question');
    $router->addModuleResource('web', 'Wechat2\Web\Controllers\User', '/web/user');
    $router->addModuleResource('wechat', 'Wechat2\Wechat\Controllers\Server', '/wechat/server');
    
    $router->addModuleResource('admin', 'Wechat2\Admin\Controllers\Index', '/admin/index');

    $router->addModuleResource('web', 'Wechat2\Web\Controllers\Index', '/web/index');

    $router->addModuleResource('wechat', 'Wechat2\Wechat\Controllers\Index', '/wechat/index');

    $router->addModuleResource('mobile', 'Wechat2\Mobile\Controllers\Index', '/mobile/index');

    return $router;
};

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di['url'] = function () use (&$di) {
    $di['logger']->log('Init global router service ');
    $url = new UrlResolver();
    $url->setBaseUri('/wechat2/');

    return $url;
};

/**
 * Starts the session the first time some component requests the session service
 */
$di['session'] = function () use (&$di) {
    $di['logger']->log('Init global router service ');
    $session = new SessionAdapter();
    $session->start();

    return $session;
};

/**
 * Overall logger service
 */
$di['logger'] = function(){
    $logger = new \Phalcon\Logger\Adapter\Stream('php://stdout');
    return $logger;
};

// USER DEFINE SHARED SERVICES
$di['userSer'] = function() {
    return new \Wechat2\Web\Services\User();
};

$di['questionSer'] = function() {
    return new \Wechat2\Web\Services\Question();
};

// DO NOT REMOVE THIS LINE

//$di->set(
//    'dispatcher',
//    function () use ($di) {
//        $logger = $di['logger'];
//        //Create an event manager
//
//        $eventsManager = new Manager();
//        //Attach a listener for type "dispatch"
//        $eventsManager->attach(
//            'dispatch',
//            function ($event, $dispatcher) use ($logger, $di) {
//                $logger->log('Dispatcher event type : ' . $event->getType());
//            }
//        );
//        $dispatcher = new Dispatcher();
//        //Bind the eventsManager to the view component
//        $dispatcher->setEventsManager($eventsManager);
//
//        return $dispatcher;
//    },
//    true
//);

