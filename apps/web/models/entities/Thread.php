<?php

namespace Wechat2\Web\Models\Entities;

class Thread extends \Phalcon\Mvc\Model
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
    public $content;

    /**
     *
     * @var string
     */
    public $create_time;

    /**
     *
     * @var string
     */
    public $question_type;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_id', 'Wechat2\Web\Models\Entities\User', 'id', array('alias' => 'User'));
    }

    public function getSource()
    {
        return 'thread';
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'content' => 'content', 
            'create_time' => 'create_time', 
            'question_type' => 'question_type', 
            'user_id' => 'user_id'
        );
    }

}
