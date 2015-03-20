<?php

namespace Wechat2\Mobile\Controllers;


/**
 * @RoutePrefix("/mobile/index")
 */
class IndexController extends ControllerBase
{

     
    /**
    * @Get("/index")
    */
     public function indexAction()
    {
        echo 'wechat_be2/mobile/index/index';
        $this->view->disable();
    }

}

