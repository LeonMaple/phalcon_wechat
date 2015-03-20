<?php

namespace Wechat2\Admin\Controllers;

use Wechat2\Web\Models\Entities\Sign;
use Wechat2\Web\Models\Entities\User;


/**
 * @RoutePrefix("/admin/index")
 */
class IndexController extends ControllerBase
{
    public function beforeExecuteRoute($dispatcher)
    {
        $this->logger->log(
            'In before execute route event of /admin/index/'
            . $dispatcher->getActionName()
        );
    }

    /**
     * @Get("/index")
     */
    public function indexAction()
    {
        $this->logger->log('Call index action of admin module');
//        $user = User::FindFirst();
        $sign = Sign::FindFirst();
        $user = $sign->user;
        $this->view->setVar('user', $user);
        $this->dispatcher->forward(
            array(
                "controller" => "index",
                "action"     => "test"
            )
        );
//        $this->view->disable();
//        $this->view->cache(
//            array(
//                "lifetime" => 86400,
//                "key"      => "resume-cache",
//            )
//        );
    }

    /**
     * @Get("/test")
     */
    public function testAction()
    {
        $this->logger->log('Call test action of admin module');

//        return $this->response->setContent('Hi bro');
    }

    public function afterExecuteRoute($dispatcher)
    {
        $this->logger->log(
            'In after execute route event of /admin/index/'
            . $dispatcher->getActionName()
        );
    }
}

