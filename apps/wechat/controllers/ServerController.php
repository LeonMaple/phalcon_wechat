<?php

namespace Wechat2\Wechat\Controllers;

use Wechat2\Web\Models\Entities\User;
use Wechat2\Web\Models\Entities\Sign;
use Wechat2\Wechat\Controllers\WechatController;
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
            'token'=>'xx',
            'encodingaeskey'=>'xx',
            'appid'=>'xx',
            'appsecret'=>'xx'
        );
        $weObj = new WechatController($options);
        $weObj -> valid();
        $type = $weObj->getRev()->getRevType();
        switch($type) {
            case WechatController::MSGTYPE_TEXT:
                $this->textAction($weObj);
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
                $weObj->text(WechatController::TEXT)->reply();
        }
        $this->meunAction($weObj);
    }

    public function subscribeAction(WechatController $weObj)
    {
        // TODO 获取用户的信息，并保存到数据库
        $UserInfo = $this->userinfoAction($weObj);
        $weObj->text($UserInfo)->reply();

        $user = new User();
        $user->save(array( "open_id"=>$UserInfo{openid}, "name"=>$UserInfo{nickname},"sex"=>$UserInfo{sex},"avatar"=>$UserInfo{headimgurl},"create_time"=>$UserInfo{CreateTime},"experience"=>"200","integral"=>"100","phone"=>"18888888888","code"=>"a000001","question"=>"1" ));

        $newsData = array(
            0=>array(
                'Title'=>'xx',
                'Description'=>"xx",
                'PicUrl'=>'xx',
                'Url'=>'xx'
            ),
        );
        $weObj->news($newsData)->reply();
    }

    public function unsubscribeAction(WechatController $weObj)
    {
        // TODO 做一些删除用户记录之类的事情
        $UserInfo = $this->userinfoAction($weObj);
        $id = $UserInfo{openid};
        $user = User::findFirst("open_id='$id'");
        $sign = Sign::findFirst("user_id='$user->id'");
        foreach (Sign::find("id='$sign->id'") as $si_id) {
            if ($si_id->delete() == false) {}
        }
        foreach (User::find("open_id='$id'") as $us_id) {
            if ($us_id->delete() == false) {}
        }
    }

    public function textAction(WechatController $weObj)
    {
        // TODO 文本消息的回复，做yes|y上传，no|n取消的判断
        $weObj->text(WechatController::TEXT)->reply();
    }

    public function clickAction(WechatController $weObj)
    {
        // TODO 点击菜单事件消息处理
        $revEvent = $weObj->getRevEvent();
        switch ($revEvent['key']) {
            case WechatController::V1001_TODAY_QD:
                $this->signAction($weObj);
                break;
            case WechatController::V1001_TODAY_SX:
                $weObj->text(WechatController::SX)->reply();
                break;
            case WechatController::V1001_TODAY_WL:
                $weObj->text(WechatController::WL)->reply();
                break;
            case WechatController::V1001_TODAY_HX:
                $weObj->text(WechatController::HX)->reply();
                break;
            case WechatController::V1001_TODAY_YY:
                $weObj->text(WechatController::YY)->reply();
                break;
            case WechatController::V1001_TODAY_QT:
                $weObj->text(WechatController::QT)->reply();
                break;
            default:
                $weObj->text(WechatController::TEXT)->reply();
                break;
        }
    }

    public function signAction(WechatController $weObj)
    {
        $info = $weObj->getRevFrom();
        $user = User::findFirst("open_id='$info'");
        $open_id = $user->open_id;
        $id = $user->id;
        if(!empty($open_id)){
            $sign = Sign::findFirst("user_id='$user->id'");
            if(!empty($sign)){
                $weObj->text("你今天已经签过到了")->reply();
            } else {
                $user_id = new Sign();
                $user_id->save(array( "time"=>date("Y:m:d H:i:s"), "count"=>1, "user_id"=>$id, "date"=>date("Y:m:d")));
                $weObj->text("签到成功")->reply();
            }
        } else {
            $weObj->text("没数据".$open_id)->reply();
        }

    }

    public function userinfoAction(WechatController $weObj)
    {
        $openid = $weObj->getRevFrom();
        $UserInfo = $weObj->getUserInfo($openid);
        return $UserInfo;
    }

    public function meunAction(WechatController $weObj)
    {

    }

}

