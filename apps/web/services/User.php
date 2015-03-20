<?php
/**
 * Created by PhpStorm.
 * User: kuroro2121
 * Date: 15/3/13
 * Time: 11:05
 */

namespace Wechat2\Web\Services;

use Wechat2\Web\Models\Entities\Sign;
use Wechat2\Web\Models\Entities\User as EntityUser;
use Wechat2\Web\Services\Exceptions\UserNotFoundException;

class User {

    public function register($params)
    {

    }

    public function sign($user)
    {

    }

    public function getUser($id)
    {
        $user =  EntityUser::findFirst($id);
        if (empty($user)) {
            throw new UserNotFoundException("Failed to find user with id ($id)");
        }
        return $user;
    }

    public function getSignRecords($id)
    {
        $signs = Sign::find("user_id = $id");

        return $signs;
    }
    // DO NOT REMOVE THIS LINE
}