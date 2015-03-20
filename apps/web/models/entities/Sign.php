<?php

namespace Wechat2\Web\Models\Entities;

class Sign extends \Phalcon\Mvc\Model
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
    public $time;

    /**
     *
     * @var integer
     */
    public $count;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_id', 'Wechat2\Web\Models\Entities\User', 'id', array('alias' => 'User'));
    }

    public function getSource()
    {
        return 'sign';
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'time' => 'time', 
            'count' => 'count', 
            'user_id' => 'user_id', 
            'date' => 'date'
        );
    }

}
