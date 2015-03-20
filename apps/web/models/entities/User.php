<?php

namespace Wechat2\Web\Models\Entities;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $open_id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $experience;

    /**
     *
     * @var string
     */
    public $grade;

    /**
     *
     * @var string
     */
    public $avatar;

    /**
     *
     * @var integer
     */
    public $integral;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $create_time;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $sex;

    /**
     *
     * @var string
     */
    public $question_type;

    /**
     *
     * @var integer
     */
    public $last_signin;

    /**
     *
     * @var integer
     */
    public $signin_count;

    /**
     *
     * @var string
     */
    public $introduction;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Wechat2\Web\Models\Entities\Answer', 'user_id', array('alias' => 'Answer'));
        $this->hasMany('id', 'Wechat2\Web\Models\Entities\Question', 'user_id', array('alias' => 'Question'));
        $this->hasMany('id', 'Wechat2\Web\Models\Entities\Sign', 'user_id', array('alias' => 'Sign'));
        $this->hasMany('id', 'Wechat2\Web\Models\Entities\Thread', 'user_id', array('alias' => 'Thread'));
    }

    public function getSource()
    {
        return 'user';
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'open_id' => 'open_id', 
            'name' => 'name', 
            'experience' => 'experience', 
            'grade' => 'grade', 
            'avatar' => 'avatar', 
            'integral' => 'integral', 
            'phone' => 'phone', 
            'create_time' => 'create_time', 
            'code' => 'code', 
            'sex' => 'sex', 
            'question_type' => 'question_type', 
            'last_signin' => 'last_signin', 
            'signin_count' => 'signin_count', 
            'introduction' => 'introduction'
        );
    }

}
