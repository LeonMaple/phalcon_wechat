<?php

namespace Wechat2\Wechat\Controllers;


/**
 * @RoutePrefix("/wechat/server")
 */
class ServerController extends \Phalcon\Mvc\Controller
{

    /**
     * 判断用户是来自哪个微信公众号
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
            'token'=>'weixin',
            'encodingaeskey'=>'7KwhE0lujwKp6QlqFa8MAjicMJwMbandxwV4FByJOEu',
//            'appid'=>'wxdeed10a72a696a11',
//            'appsecret'=>'958fb87facfd51760457fb66a08feaae'
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
                'Title'=>'你好！欢迎关注靠他网',
                'Description'=>"你好！欢迎新朋友",
                'PicUrl'=>'http://www.kaota.com/themes/default/images/logo.png',
                'Url'=>'http://www.kaota.com'
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
        $revEvent = $weObj->getRevEvent();
        switch ($revEvent['key']) {
            case WechatController::V1001_TODAY_QD:
                // TODO 签到，在数据库增加签到次数的数据判断
                $weObj->text('点击签到')->reply();
                break;
            case WechatController::V1001_TODAY_SX:
                $weObj->text("您已开启“数学”科目的提问模式, 请使用图片或者文字来描述问题详情，一次一道题，回复“Y”提交问题，回复“N”取消提问。 ")->reply();
                break;
            case WechatController::V1001_TODAY_WL:
                $weObj->text("您已开启“物理”科目的提问模式，请使用图片或者文字来描述问题详情，一次一道题，回复“Y”提交问题，回复“N”取消提问。")->reply();
                break;
            case WechatController::V1001_TODAY_HX:
                $weObj->text("您已开启“化学”科目的提问模式，请使用图片或者文字来描述问题详情，一次一道题，回复“Y”提交问题，回复“N”取消提问。")->reply();
                break;
            case WechatController::V1001_TODAY_YY:
                $weObj->text("您已开启“英语”科目的提问模式，请使用图片或者文字来描述问题详情，一次一道题，回复“Y”提交问题，回复“N”取消提问。")->reply();
                break;
            case WechatController::V1001_TODAY_QT:
                $weObj->text("您已开启“其他”科目的提问模式，请使用图片或者文字来描述问题详情，一次一道题，回复“Y”提交问题，回复“N”取消提问。")->reply();
                break;
            default:
                $weObj->text("有问题了吗？请点击“我要提问”按钮哦。.....")->reply();
                break;
        }
    }

    public function textAction($weObj)
    {
        // TODO 文本消息的回复，做yes|y上传，no|n取消的判断
        $weObj->text("有问题了吗？请点击“我要提问”按钮哦。")->reply();
    }

    public function meunAction($weObj)
    {
        $weObj->getMenu();
        $newmenu =  array (
            'button' => array (
                0 => array (
                    'name' => '我要提问',
                    'sub_button' => array (
                        0 => array ('type' => 'click','name' => '    数学    ','key' => 'V1001_TODAY_SX',),
                        1 => array ('type' => 'click','name' => '    物理    ','key' => 'V1001_TODAY_WL',),
                        2 => array ('type' => 'click','name' => '    化学    ','key' => 'V1001_TODAY_HX',),
                        3 => array ('type' => 'click','name' => '    英语    ','key' => 'V1001_TODAY_YY',),
                        4 => array ('type' => 'click','name' => '    其他    ','key' => 'V1001_TODAY_QT',),
                    ),
                ),
                1 => array (
                    'name' => '直播讲堂',
                    'sub_button' => array (
                        0 => array ('type' => 'view','name' => '当月课表','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_Schedule.php',),
                        1 => array ('type' => 'view','name' => '往期回复','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_Reply.php',),
                        2 => array ('type' => 'view','name' => '报名一对一','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_Registration.php',),
                        3 => array ('type' => 'view','name' => '预约直播答疑','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_Booking.php',),
                        4 => array ('type' => 'pic_weixin','name' => '弹出相册  ','key' => 'rselfmenu_1_1',),
                    ),
                ),
                2 => array (
                    'name' => '个人中心',
                    'sub_button' => array (
                        0 => array ('type' => 'view','name' => '个人中心','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_personal.php',),
                        1 => array ('type' => 'view','name' => '靠他帮助','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_help.html.twig',),
                        2 => array ('type' => 'view','name' => '建议反馈','url' => 'http://leonmaple.sinaapp.com/src/Weixin/WxBundle/Resources/views/kt_feedback.html.twig',),
                        3 => array ('type' => 'click','name' => '签到','key' => 'V1001_TODAY_QD',),
                        4 => array ('type' => 'pic_photo_or_album','name' => '拍照或者相册发图','key' => 'rselfmenu_1_1',),
                    ),
                ),
            ),
        );
        $weObj->createMenu($newmenu);
    }

}

