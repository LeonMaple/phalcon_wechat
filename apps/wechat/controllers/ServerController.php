<?php

namespace Wechat2\Wechat\Controllers;


/**
 * @RoutePrefix("/wechat/server")
 */
class ServerController extends \Phalcon\Mvc\Controller
{

    /**
     * Determine the user from which WeChat public platform
     */
    public function beforeExecuteRoute()
    {

    }

    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        // TODO process message from wechat server
        $options = array(
            'token'=>'xx',
            'encodingaeskey'=>'xx',
//            'appid'=>'xx',
//            'appsecret'=>'xx'
        );
        $weObj = new WechatController($options);
        $weObj -> valid();
        $type = $weObj->getRev()->getRevType();
        switch($type) {
            case WechatController::MSGTYPE_TEXT:
                $this->textAction($weObj);
                exit;
                break;
            case WechatController::MSGTYPE_EVENT:
                $revEvent = array();
                $revEvent = $weObj->getRevEvent();
                switch ($revEvent['event']) {
                    case "subscribe":
                        $this->subscribeAction($weObj);
                        break;
                    case "unsubscribe":
                        $this->unsubscribeAction($weObj);
                        break;
                    case "CLICK":
                        $this->clickAction($weObj);
                        break;
                }
                break;
            default:
                $weObj->text("有问题了吗？请点击“我要提问”按钮哦。")->reply();
        }
        $this->meunAction($weObj);
    }

    public function subscribeAction($weObj)
    {
        // TODO 获取用户的信息，并保存到数据库
        // array {subscribe,openid,nickname,sex,city,province,country,language,headimgurl,subscribe_time,[unionid]};
//        $openid = $weObj->getRevFrom()->reply();
        $weObj->text($weObj->getUserInfo())->reply();

        $newsData = array(
            0=>array(
                'Title'=>'标题1',
                'Description'=>"内容",
                'PicUrl'=>'图片url',
                'Url'=>'网页url'
            ),
        );
        $weObj->news($newsData)->reply();

    }

    public function unsubscribeAction($weObj)
    {
        // TODO 做一些删除用户记录之类的事情

    }

    public function clickAction($weObj)
    {
        // TODO 点击菜单事件消息处理
       
    }

    public function textAction($weObj)
    {
        // TODO 文本消息的回复，做yes|y上传，no|n取消的判断
        $weObj->text("有问题了吗？请点击“我要提问”按钮哦。")->reply();
    }

    public function meunAction($weObj)
    {
        // TODO 自定义菜单设置
        
    }

}

