<?php

namespace Wechat2\Web\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function forward($params)
    {
        $this->dispatcher->forward($params);
    }
}
