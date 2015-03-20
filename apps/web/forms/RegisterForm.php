<?php
/**
 * Created by PhpStorm.
 * User: kuroro2121
 * Date: 15/3/12
 * Time: 14:38
 */

namespace Wechat2\Web\Forms;


use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

class RegisterForm extends Form{
    public function initialize() {
        $this->add(new Text("username"));
        $this->add(new Password("password"));
        $this->add(new Text("captcha"));
        $this->add(new Text("sms_code"));
    }
}