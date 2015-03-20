<?php

namespace Wechat2\Web\Models\Entities;

class Question extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var integer
     */
    public $external_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_id', 'Wechat2\Web\Models\Entities\User', 'id', array('alias' => 'User'));
    }

    public function getSource()
    {
        return 'question';
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'user_id' => 'user_id', 
            'content' => 'content', 
            'external_id' => 'external_id', 
            'status' => 'status', 
            'type' => 'type'
        );
    }

}
