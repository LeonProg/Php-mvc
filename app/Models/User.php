<?php

namespace App\Models;

use App\Utils\ErrorConsts;

class User extends Models
{
    public string $table = "users";

    public static function getUser()
    {
        $id = $_SESSION["AUTH_USER_ID"];
        $user = new User();
        $user = $user->findItem($id);
//        $user = \R::findOne("users", "id = ?", [$id]);

        if (isset($user)) {
            return [
                "name" => $user->name,
                "email" => $user->email,
            ];
        }
        return ErrorConsts::REQUEST_ERROR;
    }

    public static function getUserId()
    {
        return $_SESSION["AUTH_USER_ID"];
    }


}