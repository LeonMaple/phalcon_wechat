<?php

namespace Wechat2\Web\Controllers;
use Wechat2\Web\Models\Entities\User;

/**
 * @RoutePrefix("/web/index")
 */
class IndexController extends ControllerBase
{

     
    /**
    * @Get("/index")
    */
     public function indexAction()
    {
//        $user = $this->userSer->getUser(71);
//        $this->view->user = $user;
    }

    /**
     * @Get("/try")
     * @return \Phalcon\Http\ResponseInterface
     */
    public function tryAction()
    {
    }

    /**
     * @Get("/add")
     */
    public function addAction()
    {
        $user = User::findFirst();
        echo $user->appid;
        $this->view->disable();
    }

}

