<?php

namespace Wechat2\Web\Controllers;
use Wechat2\Web\Models\Entities\User;


/**
 * @RoutePrefix("/web/user")
 */
class UserController extends \Phalcon\Mvc\Controller
{

     
    /**
    * @Route("/register", methods={"POST", "GET"}, name="user_register")
    */
    public function registerAction()
    {

    }

    /**
     * @Route("/edit", methods={"POST", "GET"}, name="user_edit")
     */
    public function editAction()
    {

    }

    /**
     * @Get("/sign",name="user_sign")
     */
    public function signAction()
    {
        return $this->response->setContent('Web::User::sign');
    }

    /**
     * @Route("/login",name="user_login")
     */
    public function loginAction()
    {

    }

    /**
     * @Get("/{id:[0-9]+}/signs")
     * @param $id
     */
    public function signsAction($id)
    {
        $user = $this->userSer->getUser($id);
        $signs = $this->userSer->getSignRecords($user->id);

        $this->view->signs = $signs;
        $this->view->user = $user;
        $this->view->pick('user/signs');
//        $this->view->pick('index/index');
    }

    /**
     * @Get('/user')
     */
    public function userAction()
    {
        $user = User::findFirst();
        echo $user->name;
        $this->view->disable();
    }
}

