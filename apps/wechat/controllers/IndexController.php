<?php

namespace Wechat2\Wechat\Controllers;
use Wechat2\Web\Models\Entities\User;

/**
 * @RoutePrefix("/wechat/index")
 */
class IndexController extends ControllerBase
{
    /**
     * @Get("/index")
     */
    public function indexAction()
    {
        $user = User::findFirst(1);
        $this->userAction($user);
        echo 'wechat_be2/wechat2/index/index';
    }

    /**
     * @Get("/user")
     */
    public function userAction($user)
    {
        echo $user->name;
    }
}

